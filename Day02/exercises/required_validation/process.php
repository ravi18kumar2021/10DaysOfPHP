<?php
$name = trim($_POST['name'] ?? '');
if ($name === '') {
    echo "Name is required";
    exit;
}
echo "Welcome, " . htmlspecialchars($name);
?>