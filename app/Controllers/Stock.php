<?php namespace App\Controllers;

use App\Models\InventoryModel;

class Stock extends BaseController {
    public function index() {
        $model = new InventoryModel();
        
        $data = [
            'title' => 'Stock Management',
            'inventory' => $model->findAll()
        ];
        
        return view('stock/index', $data);
    }

    public function update() {
        $model = new InventoryModel();
        $id = $this->request->getPost('id');
        $addQty = $this->request->getPost('add_qty');

        $item = $model->find($id);
        if ($item) {
            $newStock = $item['stock'] + $addQty;
            $model->update($id, ['stock' => $newStock]);
            return redirect()->to('/stock')->with('success', 'Stock updated successfully for ' . $item['item_name']);
        }

        return redirect()->to('/stock')->with('error', 'Failed to update stock.');
    }
}
