<?php
$name = trim($_GET['name']);
if ($name === '') {
    echo "Name is required";
} else {
    echo "Welcome";
}
?>