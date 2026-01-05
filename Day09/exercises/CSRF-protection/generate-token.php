<?php
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<h2>User form</h2>
<form action="validate-token.php" method="post">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <input type="text" name="username" placeholder="Enter username">
    <input type="submit" value="Check">
</form>