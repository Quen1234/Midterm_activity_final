<?php

namespace App\Controllers;

use App\Models\ListahanModel;
use App\Models\TransactionModel;

class Listahan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        if (!$db->fieldExists('due_date', 'listahan')) {
            $forge = \Config\Database::forge();
            $fields = [
                'due_date' => [
                    'type' => 'DATE',
                    'null' => true,
                    'after' => 'amount'
                ],
            ];
            $forge->addColumn('listahan', $fields);
        }

        if (!$db->fieldExists('email', 'listahan')) {
            $forge = \Config\Database::forge();
            $fields = [
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                    'after' => 'customer_name'
                ],
            ];
            $forge->addColumn('listahan', $fields);
        }

        $model = new ListahanModel();
        $data['listahan'] = $model->orderBy('created_at', 'DESC')->findAll();
        return view('listahan/index', $data);
    }

    public function store()
    {
        $model = new ListahanModel();
        
        // Use custom due date if provided, otherwise default to 7 days from now
        $dueDate = $this->request->getPost('due_date');
        if (empty($dueDate)) {
            $dueDate = date('Y-m-d', strtotime('+7 days'));
        }

        $model->save([
            'customer_name' => $this->request->getPost('customer_name'),
            'email'         => $this->request->getPost('email'),
            'items'         => $this->request->getPost('items'),
            'amount'        => $this->request->getPost('amount'),
            'due_date'      => $dueDate,
            'status'        => 'unpaid'
        ]);
        return redirect()->to('/listahan')->with('status', 'Added successfully!');
    }

    public function settle($id)
    {
        $listahanModel = new ListahanModel();
        $transactionModel = new TransactionModel();
        
        $debt = $listahanModel->find($id);
        if ($debt) {
            $method = $this->request->getGet('method') ?? 'cash';
            $amountToPay = $this->request->getGet('amount') ? floatval($this->request->getGet('amount')) : floatval($debt['amount']);
            
            // Record as transaction
            $transactionModel->save([
                'customer_name'  => $debt['customer_name'],
                'payment_method' => $method,
                'total_amount'   => $debt['amount'], // The original debt amount for this transaction
                'amount_paid'    => $amountToPay,
                'items_json'     => json_encode([['name' => ($method === 'partial' ? 'Partial ' : '') . 'Debt Settlement: ' . $debt['items'], 'qty' => 1, 'price' => $amountToPay]])
            ]);

            if ($method === 'partial' && $amountToPay < $debt['amount']) {
                // Update the remaining debt
                $newAmount = $debt['amount'] - $amountToPay;
                $listahanModel->update($id, ['amount' => $newAmount]);
                return redirect()->to('/listahan')->with('status', 'Partial payment of ₱' . number_format($amountToPay, 2) . ' received. Remaining debt: ₱' . number_format($newAmount, 2));
            } else {
                // Full settlement
                $listahanModel->delete($id);
                return redirect()->to('/listahan')->with('status', 'Debt settled and recorded successfully!');
            }
        }

        return redirect()->to('/listahan')->with('error', 'Debt record not found!');
    }

    public function delete($id)
    {
        $model = new ListahanModel();
        $model->delete($id);
        return redirect()->to('/listahan')->with('status', 'Deleted successfully!');
    }

    public function sendNotice()
    {
        $json = $this->request->getJSON();
        if (!$json) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data']);
        }

        $email = $json->email;
        $name = $json->name;
        $amount = $json->amount;
        $dueDate = $json->due_date;

        $emailService = \Config\Services::email();

        // Note: In a real production environment, you would configure SMTP in app/Config/Email.php
        $emailService->setTo($email);
        $emailService->setFrom('noreply@nanaylivys.com', "Nanay Livy's Store");
        $emailService->setSubject('Payment Reminder - Nanay Livy\'s Store');
        
        $message = "
            <h2>Payment Reminder</h2>
            <p>Hi <strong>{$name}</strong>,</p>
            <p>This is a friendly reminder from <strong>Nanay Livy's Store</strong> regarding your outstanding balance.</p>
            <div style='background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #4361ee;'>
                <p style='margin: 0;'><strong>Amount Due:</strong> {$amount}</p>
                <p style='margin: 5px 0 0;'><strong>Due Date:</strong> {$dueDate}</p>
            </div>
            <p>Please settle your payment on or before the due date to avoid any inconvenience. If you have already paid, please ignore this email.</p>
            <p>Thank you for shopping with us!</p>
            <hr>
            <small>This is an automated message. Please do not reply.</small>
        ";

        $emailService->setMessage($message);

        if ($emailService->send()) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Log error for debugging
            log_message('error', $emailService->printDebugger(['headers']));
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => 'Email failed to send. Please check SMTP settings.'
            ]);
        }
    }
}