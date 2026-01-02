<?php
require "database-connection.php";

$sql = 'INSERT INTO users (name, email) VALUES (?, ?)';
$stmt = $db->conn->prepare($sql);

$users = [
    ["ravi", "ravi@gmail.com"],
    ["rahul", "rahul@gmail.com"],
    ["amit", "amit@gmail.com"]
];

foreach ($users as $user) {
    $stmt->execute($user);
}

echo "Data inserted successfully";
?>