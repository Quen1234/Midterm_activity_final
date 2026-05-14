<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
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

        // --- NEW: Automatically fix default icons for existing categories ---
        $model = new CategoryModel();
        $iconMapping = [
            'hygeine'         => 'fas fa-soap',
            'school supplies' => 'fas fa-pencil-alt',
            'beverages'       => 'fas fa-coffee',
            'wants'           => 'fas fa-heart',
            'beauty products' => 'fas fa-spray-can',
            'canned goods'    => 'fas fa-utensils',
            'medicines'       => 'fas fa-medkit',
            'mobile load'     => 'fas fa-mobile-alt',
        ];

        $allCats = $model->findAll();
        foreach ($allCats as $cat) {
            $lowerName = strtolower($cat['name']);
            // Only update if it currently has the default icon
            if (isset($iconMapping[$lowerName]) && ($cat['icon'] === 'fas fa-box' || empty($cat['icon']))) {
                $model->where('name', $cat['name'])->set(['icon' => $iconMapping[$lowerName]])->update();
            }
        }
        // -------------------------------------------------------------------

        $data['categories'] = $model->findAll();
        return view('categories/index', $data);
    }

    public function store()
    {
        $model = new CategoryModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'icon' => $this->request->getPost('icon') ?? 'fas fa-box',
        ];
        $model->save($data);
        return redirect()->to('/categories')->with('success', 'Category added successfully!');
    }

    public function update($id)
    {
        $model = new CategoryModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'icon' => $this->request->getPost('icon') ?? 'fas fa-box',
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
