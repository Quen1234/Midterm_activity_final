<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\ListahanModel;

class Pos extends BaseController
{
    public function index()
    {
        $inventoryModel = new InventoryModel();
        
        $data = [
            'title' => 'Point of Sale',
            'products' => $inventoryModel->findAll()
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

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Transaction failed']);
        }

        return $this->response->setJSON(['status' => 'success', 'transaction_id' => time()]);
    }
}
