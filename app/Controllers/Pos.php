<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\CategoryModel;
use App\Models\ListahanModel;
use App\Models\TransactionModel;
use App\Models\ActivityLogModel;

class Pos extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        if (!$db->fieldExists('icon', 'categories')) {
            $forge = \Config\Database::forge();
            $fields = [
                'icon' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'default' => 'fas fa-box',
                    'after' => 'name'
                ],
            ];
            $forge->addColumn('categories', $fields);
        }

        $inventoryModel = new InventoryModel();
        $categoryModel = new CategoryModel();
        
        $products = $inventoryModel->findAll();
        $categories = $categoryModel->findAll();
        
        // Map category name to icon for easy lookup in view
        $categoryIcons = [];
        foreach ($categories as $cat) {
            $categoryIcons[strtolower($cat['name'])] = $cat['icon'] ?? 'fas fa-box';
        }
        
        $data = [
            'title' => 'Point of Sale',
            'products' => $products,
            'categoryIcons' => $categoryIcons
        ];
        
        return view('pos/index', $data);
    }

    public function checkout()
    {
        $json = $this->request->getJSON();
        if (!$json) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid data']);
        }

        $inventoryModel = new InventoryModel();
        $listahanModel = new ListahanModel();
        $transactionModel = new TransactionModel();
        $logModel = new ActivityLogModel();
        $db = \Config\Database::connect();
        
        $db->transStart();

        // 1. Update Inventory Stock
        foreach ($json->items as $item) {
            $product = $inventoryModel->find($item->id);
            if ($product) {
                $newStock = $product['stock'] - $item->qty;
                if ($newStock < 0) {
                    $db->transRollback();
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Insufficient stock for ' . $item->name]);
                }
                $inventoryModel->update($item->id, ['stock' => $newStock]);
            }
        }

        // 2. Handle Listahan (Utang/Partial)
        if ($json->payment_method === 'utang' || $json->payment_method === 'partial') {
            $amountOwed = $json->total_amount;
            if ($json->payment_method === 'partial') {
                $amountOwed = $json->total_amount - $json->amount_paid;
            }

            if ($amountOwed > 0) {
                $itemNames = array_map(function($item) {
                    return $item->qty . 'x ' . $item->name;
                }, $json->items);

                $listahanModel->save([
                    'customer_name' => $json->customer_name,
                    'items'         => implode(', ', $itemNames),
                    'amount'        => $amountOwed,
                    'status'        => 'unpaid'
                ]);
            }
        }

        // 3. Save Transaction for Revenue Tracking
        $transactionModel->save([
            'customer_name'  => $json->customer_name,
            'payment_method' => $json->payment_method,
            'total_amount'   => $json->total_amount,
            'amount_paid'    => $json->amount_paid,
            'items_json'     => json_encode($json->items)
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction failed']);
        }

        // Record Activity Log
        $logDetails = "Sold items to {$json->customer_name} via " . strtoupper($json->payment_method) . " (Total: ₱" . number_format($json->total_amount, 2) . ")";
        $logModel->log('POS Transaction', $logDetails);

        return $this->response->setJSON(['status' => 'success', 'transaction_id' => time()]);
    }
}
