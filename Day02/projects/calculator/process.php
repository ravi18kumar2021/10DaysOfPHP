<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request";
    exit;
}
$num1 = $_POST['num1'] ?? '';
$num2 = $_POST['num2'] ?? '';
$op = $_POST['op'] ?? '';

if ($num1 === '' || $num2 === '') {
    echo "All fields are required";
    exit;
}
if (!(is_numeric($num1)) || !(is_numeric($num2))) {
    echo "Values must be numbers";
    exit;
}

switch ($op) {
    case 'add':
        echo "Addition of $num1 and $num2 = ".($num1 + $num2);
        break;
    case 'sub':
        echo "Subtraction of $num1 and $num2 = ".($num1 - $num2);
        break;
    case 'mul':
        echo "Multiplication of $num1 and $num2 = ".($num1 * $num2);
        break;
    case 'div':
        if ($num2 == 0) {
            echo "Division by zero not allowed";
        } else {
            echo "Division of $num1 and $num2 = ".($num1 / $num2);
        }
        break;
    default:
        echo "Invalid operation";
}
?>