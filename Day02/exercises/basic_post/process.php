<?php
if(!isset($_POST['name'])) {
    echo "Invalid request";
    exit;
}
echo "Hello, ". $_POST['name'];
?>