<?php
require "database-connection.php";

$sql = 'DELETE FROM users WHERE id = ?';
// $sql = 'TRUNCATE TABLE users';
// $sql = 'DROP TABLE users';
$stmt = $db->conn->prepare($sql);
$stmt->execute([2]);
// $stmt->execute();

echo "Data deleted successfully";
?>