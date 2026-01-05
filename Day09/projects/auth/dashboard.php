<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<h3>Welcome to dashboard</h3>
<a href="logout.php">Logout</a>