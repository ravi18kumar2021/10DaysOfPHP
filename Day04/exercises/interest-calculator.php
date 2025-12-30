<?php
class InterestCalculator {
    public function calculate($principal, $rate, $time) {
        return ($principal * $rate * $time) / 100;
    }
}
$calc = new InterestCalculator();
echo $calc->calculate(1000, 4, 5);
?>