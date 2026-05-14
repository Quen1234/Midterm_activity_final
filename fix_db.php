<?php

// Fix the categories table schema
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';

$db = \Config\Database::connect();
$forge = \Config\Database::forge();

echo "Checking categories table...\n";

// Check if id column is auto-increment
$fields = $db->getFieldData('categories');
$idField = null;
foreach ($fields as $field) {
    if ($idField === null && $field->name === 'id') {
        $idField = $field;
        break;
    }
}

if ($idField) {
    echo "ID field found. Type: {$idField->type}, Primary: " . ($idField->primary_key ? 'Yes' : 'No') . "\n";
    
    // We want to force it to be an auto-incrementing primary key
    // First, let's delete any duplicate 0 IDs if they exist, or just assign them new IDs
    $db->query("SET FOREIGN_KEY_CHECKS=0");
    
    $categories = $db->table('categories')->get()->getResult();
    $nextId = 1;
    foreach ($categories as $cat) {
        $db->table('categories')->where('name', $cat->name)->where('id', $cat->id)->update(['id' => $nextId]);
        $nextId++;
    }
    
    // Now modify the column to be auto_increment
    $forge->modifyColumn('categories', [
        'id' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
    ]);
    
    $db->query("SET FOREIGN_KEY_CHECKS=1");
    echo "Table schema updated successfully!\n";
} else {
    echo "ID field not found!\n";
}
