<?php namespace App\Controllers;

use App\Models\UtangModel; // Import your model

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // IMPORTANT: Change 'listahan' to the EXACT name of your table in phpMyAdmin
        $builder = $db->table('listahan'); 
        
        // Optional: Only count items that are NOT paid
        // $builder->where('status', 'Unpaid'); 
    
        $count = $builder->countAllResults();
    
        $data = [
            'active_utang_count' => $count,
            // ... include your other existing data (sales, low stock) here ...
        ];
    
        return view('dashboard/index', $data);
    }
}
