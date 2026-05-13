<?php namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\InventoryModel;
use App\Models\ListahanModel;

class Reports extends BaseController {
    
    public function index() {
        $transactionModel = new TransactionModel();
        $inventoryModel = new InventoryModel();
        $listahanModel = new ListahanModel();
        $db = \Config\Database::connect();

        // 1. Financial Overview
        $totalSales = $transactionModel->selectSum('total_amount')->first()['total_amount'] ?? 0;
        $totalCollected = $transactionModel->selectSum('amount_paid')->first()['amount_paid'] ?? 0;
        $totalPending = $listahanModel->selectSum('amount')->first()['amount'] ?? 0;
        
        // 2. Sales by Payment Method
        $paymentMethods = $db->table('transactions')
            ->select('payment_method, COUNT(*) as count, SUM(amount_paid) as total')
            ->groupBy('payment_method')
            ->get()->getResultArray();

        // 3. Sales Trends (Daily - Last 15 Days)
        $dailyTrends = $db->table('transactions')
            ->select("DATE(created_at) as date, SUM(amount_paid) as total")
            ->where('created_at >=', date('Y-m-d', strtotime('-15 days')))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()->getResultArray();

        // 4. Monthly Trends (Last 12 Months)
        $monthlyTrends = $db->table('transactions')
            ->select("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(amount_paid) as total")
            ->where('created_at >=', date('Y-m-d', strtotime('-12 months')))
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get()->getResultArray();

        // 5. Category Performance
        // Since category is in inventory, and items are stored as JSON in transactions, 
        // we need to parse JSON or do a more complex join. 
        // For simplicity and performance in this sari-sari store scale, we'll look at the inventory distribution first.
        $categoryDist = $db->table('inventory')
            ->select('category, COUNT(*) as count, SUM(stock) as total_stock')
            ->groupBy('category')
            ->get()->getResultArray();

        // 6. Top Selling Items (Parsing JSON)
        $transactions = $transactionModel->orderBy('created_at', 'DESC')->limit(100)->findAll();
        $itemSales = [];
        foreach ($transactions as $t) {
            $items = json_decode($t['items_json'], true);
            if (is_array($items)) {
                foreach ($items as $item) {
                    $name = $item['name'] ?? 'Unknown';
                    $qty = $item['qty'] ?? 0;
                    $itemSales[$name] = ($itemSales[$name] ?? 0) + $qty;
                }
            }
        }
        arsort($itemSales);
        $topItems = array_slice($itemSales, 0, 5);

        $data = [
            'title' => 'Reports & Analytics',
            'overview' => [
                'total_sales' => $totalSales,
                'total_collected' => $totalCollected,
                'total_pending' => $totalPending
            ],
            'payment_methods' => $paymentMethods,
            'daily_trends' => $dailyTrends,
            'monthly_trends' => $monthlyTrends,
            'category_dist' => $categoryDist,
            'top_items' => $topItems
        ];

        return view('reports/index', $data);
    }
}
