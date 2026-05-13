<?php

namespace App\Models;

use CodeIgniter\Model;

class ListahanModel extends Model
{
    protected $table = 'listahan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_name', 'email', 'phone_number', 'items', 'amount', 'due_date', 'status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
}