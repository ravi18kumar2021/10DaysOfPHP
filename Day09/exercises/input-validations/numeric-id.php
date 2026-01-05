<?php
$id = $_GET['id'];
if (!ctype_digit($id)) {
    die("Invalid ID");
} else {
    echo "Valid ID";
}
?>