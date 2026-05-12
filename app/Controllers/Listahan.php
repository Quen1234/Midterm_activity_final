<?php

namespace App\Controllers;

use App\Models\ListahanModel;
use App\Models\TransactionModel;

class Listahan extends BaseController
{
    public function index()
    {
        $model = new ListahanModel();
        $data['listahan'] = $model->orderBy('created_at', 'DESC')->findAll();
        return view('listahan/index', $data);
    }

    public function store()
    {
        $model = new ListahanModel();
        $model->save([
            'customer_name' => $this->request->getPost('customer_name'),
            'items'         => $this->request->getPost('items'),
            'amount'        => $this->request->getPost('amount'),
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
}