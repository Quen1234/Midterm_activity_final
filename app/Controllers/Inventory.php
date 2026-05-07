<?php

namespace App\Controllers;

use App\Models\InventoryModel;

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

        $data = [
            'barcode'   => $this->request->getPost('barcode'),
            'item_name' => $this->request->getPost('item_name'),
            'category'  => $this->request->getPost('category'),
            'price'     => $this->request->getPost('price'),
            'stock'     => $this->request->getPost('stock'),
        ];

        $model->save($data);
        return redirect()->to('/inventory')->with('status', 'Item saved successfully!');
    }

    public function delete($id)
    {
        $model = new InventoryModel();
        $model->delete($id);
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
        
        $data = [
            'barcode'   => $this->request->getPost('barcode'),
            'item_name' => $this->request->getPost('item_name'),
            'category'  => $this->request->getPost('category'),
            'price'     => $this->request->getPost('price'),
            'stock'     => $this->request->getPost('stock'),
        ];

        $model->update($id, $data);
        return redirect()->to('/inventory')->with('status', 'Item updated successfully!');
    }
}