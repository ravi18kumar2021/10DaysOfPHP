<?php
class CalculatorService {
    public function add($a, $b) {
        return $a + $b;
    }
    public function subtract($a, $b) {
        return $a - $b;
    }
    public function multiply($a, $b) {
        return $a * $b;
    }
    public function divide($a, $b) {
        if ($b === 0) {
            return "Division by zero not allowed";
        }
        return $a / $b;
    }
}
$calc = new CalculatorService();
echo $calc->add(45, 23);
?>