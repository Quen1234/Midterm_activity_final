<?php

namespace App\Controllers;

use App\Models\ListahanModel;

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
        ]);
        return redirect()->to('/listahan')->with('status', 'Added successfully!');
    }

    public function delete($id)
    {
        $model = new ListahanModel();
        $model->delete($id);
        return redirect()->to('/listahan')->with('status', 'Deleted successfully!');
    }
}