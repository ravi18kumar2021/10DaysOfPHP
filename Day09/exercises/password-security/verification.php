<?php
$user_password = "ravi123";
$hash_password = password_hash("ravi321", PASSWORD_DEFAULT);
if (password_verify($user_password, $hash_password)) {
    echo "password matched";
} else {
    echo "password not matched";
}
?>