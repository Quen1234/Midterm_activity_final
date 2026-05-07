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
}
