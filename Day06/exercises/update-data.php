<?php
require "database-connection.php";

$sql = 'UPDATE users SET email = ? WHERE id = ?';
$stmt = $db->conn->prepare($sql);
$stmt->execute(["amit@yahoo.com", 3]);

echo "Data updated successfully";
?>