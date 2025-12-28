<?php
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$age = $_POST['age'] ?? '';

if ($name === '' || $email === '' || $age === '') {
    echo "All fields are required";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
    exit;
}
if (!(is_numeric($age))) {
    echo "Age must be a number";
    exit;
} elseif ($age < 0) {
    echo "Age can't be negative";
    exit;
}
echo "Form submitted successfully";
?>