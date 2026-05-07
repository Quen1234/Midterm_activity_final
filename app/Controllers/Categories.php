<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        return view('categories/index', $data);
    }

    public function store()
    {
        $model = new CategoryModel();
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $model->save($data);
        return redirect()->to('/categories')->with('success', 'Category added successfully!');
    }

    public function update($id)
    {
        $model = new CategoryModel();
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $model->update($id, $data);
        return redirect()->to('/categories')->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        $model->delete($id);
        return redirect()->to('/categories')->with('success', 'Category deleted successfully!');
    }
}
