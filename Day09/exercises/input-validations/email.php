<?php
$email = "ravi@gmail.com";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
}
?>