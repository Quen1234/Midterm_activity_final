<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/bootstrap.php';

$db = \Config\Database::connect();
$query = $db->query("SELECT * FROM categories");
$results = $query->getResult();

echo "--- Categories Table Data ---\n";
foreach ($results as $row) {
    echo "ID: {$row->id} | Name: {$row->name} | Icon: {$row->icon}\n";
}

echo "\n--- Table Structure ---\n";
$fields = $db->getFieldData('categories');
foreach ($fields as $field) {
    echo "Field: {$field->name} | Type: {$field->type} | Primary: " . ($field->primary_key ? 'Yes' : 'No') . " | Auto-Increment: " . (isset($field->auto_increment) && $field->auto_increment ? 'Yes' : 'No') . "\n";
}
