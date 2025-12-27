<?php
if (!isset($_GET['num1'], $_GET['num2'], $_GET['op'])) {
    echo "Missing parameters";
    exit;
}
function calculate($num1, $num2, $op) {
    switch ($op) {
        case 'add':
            return $num1 + $num2;
        case 'sub':
            return $num1 - $num2;
        case 'mul':
            return $num1 * $num2;
        case 'div':
            if ($num2 == 0) {
                return "Division by zero not allowed";
            }
           return $num1 / $num2;
        default:
            return "Invalid operator";
    }
}
$num1 = floatval($_GET['num1']);
$num2 = floatval($_GET['num2']);
$op = $_GET['op'];
echo calculate($num1, $num2, $op);
?>