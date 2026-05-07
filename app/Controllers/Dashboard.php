<?php namespace App\Controllers;

use App\Models\ListahanModel;
use App\Models\InventoryModel;
use App\Models\TransactionModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $listahanModel = new ListahanModel();
        $inventoryModel = new InventoryModel();
        $transactionModel = new TransactionModel();
        
        // 1. Calculate Today's Revenue (Sum of amount_paid for today)
        $today = date('Y-m-d');
        $revenueData = $transactionModel->selectSum('amount_paid')
                                      ->like('created_at', $today, 'after')
                                      ->first();
        $todayRevenue = $revenueData['amount_paid'] ?? 0;

        // 2. Active Listahan Count
        $activeListahan = $listahanModel->countAllResults();

        // 3. Low Stock Alerts (Stock <= 5)
        $lowStockCount = $inventoryModel->where('stock <=', 5)->countAllResults();
    
        $data = [
            'today_revenue' => $todayRevenue,
            'active_utang_count' => $activeListahan,
            'low_stock_count' => $lowStockCount,
            'title' => 'Dashboard Overview'
        ];
    
        return view('dashboard/index', $data);
    }
}
