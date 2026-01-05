<?php
$password = "ravi123";
$hash_pass1 = password_hash($password, PASSWORD_DEFAULT);
$hash_pass2 = password_hash($password, PASSWORD_BCRYPT);
echo $hash_pass1;
echo "<br>";
echo $hash_pass2;
?>