<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $forge = \Config\Database::forge();

        // Ensure icon column exists
        if (!$db->fieldExists('icon', 'categories')) {
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

        // --- NEW: Ensure ID is auto-increment and not zero ---
        $fields = $db->getFieldData('categories');
        $isAutoIncrement = false;
        foreach ($fields as $field) {
            if ($field->name === 'id' && isset($field->primary_key) && $field->primary_key && isset($field->auto_increment) && $field->auto_increment) {
                $isAutoIncrement = true;
                break;
            }
        }

        if (!$isAutoIncrement) {
            // Fix any 0 IDs first
            $db->query("SET FOREIGN_KEY_CHECKS=0");
            $categories = $db->table('categories')->orderBy('id', 'ASC')->get()->getResult();
            $nextId = 1;
            foreach ($categories as $cat) {
                // Use query to avoid model/table issues during schema change
                $db->query("UPDATE categories SET id = ? WHERE id = ? AND name = ?", [$nextId, $cat->id, $cat->name]);
                $nextId++;
            }
            
            try {
                // Step 1: Ensure it is a primary key (MySQL requires this for auto_increment)
                // We wrap in try-catch because it might already be a primary key
                $db->query("ALTER TABLE categories ADD PRIMARY KEY (id)");
            } catch (\Throwable $e) {
                // Already a primary key or other non-critical error
            }

            try {
                // Step 2: Now add the AUTO_INCREMENT attribute
                $db->query("ALTER TABLE categories MODIFY id INT(11) UNSIGNED AUTO_INCREMENT");
            } catch (\Throwable $e) {
                // Log error if it still fails
                log_message('error', 'Failed to set auto_increment on categories.id: ' . $e->getMessage());
            }

            $db->query("SET FOREIGN_KEY_CHECKS=1");
        }
        // ---------------------------------------------------

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
        $oldCategory = $model->find($id);
        $newName = $this->request->getPost('name');

        $data = [
            'name' => $newName,
            'icon' => $this->request->getPost('icon') ?? 'fas fa-box',
        ];

        if ($model->update($id, $data)) {
            // Sync category name change to inventory table
            if ($oldCategory && $oldCategory['name'] !== $newName) {
                $db = \Config\Database::connect();
                $db->table('inventory')
                   ->where('category', $oldCategory['name'])
                   ->update(['category' => $newName]);
            }
        }

        return redirect()->to('/categories')->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        $model->delete($id);
        return redirect()->to('/categories')->with('success', 'Category deleted successfully!');
    }
}
