<?php
$age = $_POST['age'] ?? '';
if ($age === '') {
    echo "Age is required";
} elseif ($age < 0) {
    echo "Age can't be negative";
} elseif (!is_numeric($age)) {
    echo "Age must be a number";
} else {
    echo "Valid age : ".$age;
}
?>