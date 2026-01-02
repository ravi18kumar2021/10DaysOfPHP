<?php
require "database-connection.php";

$sql = 'SELECT * FROM users';
$stmt = $db->conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    foreach ($result as $row) {
        echo 'ID : ' . $row['id'] . '<br>';
        echo 'Name : ' . $row['name'] . '<br>';
        echo 'Email : ' . $row ['email'] . '<br><br>';
    }
} else {
    echo 'No records found';
}
?>