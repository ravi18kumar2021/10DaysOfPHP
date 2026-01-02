<?php
require "database-connection.php";

$sql = 'CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
)';
$stmt = $db->conn->prepare($sql);
$stmt->execute();

echo "Table created successfully";
?>