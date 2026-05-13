<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Models\ActivityLogModel;

class Inventory extends BaseController
{
    public function index()
    {
        $model = new InventoryModel();
        $data['inventory'] = $model->findAll();
        
        return view('inventory/index', $data);
    }

    public function add()
    {
        return view('inventory/add');
    }

    public function store()
    {
        $model = new InventoryModel();
        $logModel = new ActivityLogModel();

        $data = [
            'barcode'   => $this->request->getPost('barcode'),
            'item_name' => $this->request->getPost('item_name'),
            'category'  => $this->request->getPost('category'),
            'price'     => $this->request->getPost('price'),
            'stock'     => $this->request->getPost('stock'),
        ];

        $model->save($data);
        $logModel->log('Inventory Add', "Added new product: {$data['item_name']} (Stock: {$data['stock']})");
        return redirect()->to('/inventory')->with('status', 'Item saved successfully!');
    }

    public function delete($id)
    {
        $model = new InventoryModel();
        $logModel = new ActivityLogModel();
        
        $item = $model->find($id);
        if ($item) {
            $model->delete($id);
            $logModel->log('Inventory Delete', "Deleted product: {$item['item_name']}");
        }
        return redirect()->to('/inventory')->with('status', 'Item deleted!');
    }

    public function edit($id)
    {
        $model = new InventoryModel();
        $data['item'] = $model->find($id);
        
        if (!$data['item']) {
            return redirect()->to('/inventory')->with('error', 'Item not found!');
        }
        
        return view('inventory/edit', $data);
    }

    public function update($id)
    {
        $model = new InventoryModel();
        $logModel = new ActivityLogModel();
        
        $data = [
            'barcode'   => $this->request->getPost('barcode'),
            'item_name' => $this->request->getPost('item_name'),
            'category'  => $this->request->getPost('category'),
            'price'     => $this->request->getPost('price'),
            'stock'     => $this->request->getPost('stock'),
        ];

        $model->update($id, $data);
        $logModel->log('Inventory Update', "Updated product details for: {$data['item_name']}");
        return redirect()->to('/inventory')->with('status', 'Item updated successfully!');
    }

    public function exportCsv()
    {
        $model = new InventoryModel();
        $inventory = $model->findAll();

        $filename = 'inventory_export_' . date('Ymd') . '.csv';

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        
        // CSV Header
        fputcsv($output, ['ID', 'Item Name', 'Category', 'Price', 'Stock', 'Created At']);

        // CSV Rows
        foreach ($inventory as $item) {
            fputcsv($output, [
                $item['id'],
                $item['item_name'],
                $item['category'],
                $item['price'],
                $item['stock'],
                $item['created_at']
            ]);
        }

        fclose($output);
        exit;
    }
}