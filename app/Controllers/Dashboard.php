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

        // 4. Fetch Sales Analytics Data
        $db = \Config\Database::connect();
        
        // Daily Sales (Last 7 days)
        $dailySales = $db->table('transactions')
            ->select("DATE(created_at) as date, SUM(amount_paid) as total")
            ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
            ->groupBy("date")
            ->orderBy("date", "ASC")
            ->get()->getResultArray();

        // Weekly Sales (Last 4 weeks)
        $weeklySales = $db->table('transactions')
            ->select("YEARWEEK(created_at) as week, SUM(amount_paid) as total")
            ->where('created_at >=', date('Y-m-d', strtotime('-4 weeks')))
            ->groupBy("week")
            ->orderBy("week", "ASC")
            ->get()->getResultArray();

        // Monthly Sales (Last 6 months)
        $monthlySales = $db->table('transactions')
            ->select("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(amount_paid) as total")
            ->where('created_at >=', date('Y-m-d', strtotime('-6 months')))
            ->groupBy("month")
            ->orderBy("month", "ASC")
            ->get()->getResultArray();
    
        $data = [
            'today_revenue' => $todayRevenue,
            'active_utang_count' => $activeListahan,
            'low_stock_count' => $lowStockCount,
            'daily_sales' => $dailySales,
            'weekly_sales' => $weeklySales,
            'monthly_sales' => $monthlySales,
            'title' => 'Dashboard Overview'
        ];
    
        return view('dashboard/index', $data);
    }
}
