<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['customer_name', 'payment_method', 'total_amount', 'amount_paid', 'items_json', 'created_at'];

    protected $useTimestamps = false;
}
