<?php
$host = 'localhost';
$db   = 'livys_sari_store';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     
     echo "--- Categories Table Data ---\n";
     $stmt = $pdo->query("SELECT * FROM categories");
     while ($row = $stmt->fetch()) {
         echo "ID: {$row['id']} | Name: {$row['name']} | Icon: {$row['icon']}\n";
     }

     echo "\n--- Table Structure (DESCRIBE categories) ---\n";
     $stmt = $pdo->query("DESCRIBE categories");
     while ($row = $stmt->fetch()) {
         echo "Field: {$row['Field']} | Type: {$row['Type']} | Null: {$row['Null']} | Key: {$row['Key']} | Default: {$row['Default']} | Extra: {$row['Extra']}\n";
     }

} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
