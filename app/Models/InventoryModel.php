<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table      = 'inventory';
    protected $primaryKey = 'id';

    // Allow the system to insert into these specific columns
    protected $allowedFields = ['barcode', 'item_name', 'category', 'price', 'stock'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Set to empty if you don't have an updated_at column
}