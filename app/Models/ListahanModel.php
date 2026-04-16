<?php

namespace App\Models;

use CodeIgniter\Model;

class ListahanModel extends Model
{
    protected $table = 'listahan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_name', 'items', 'amount', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}