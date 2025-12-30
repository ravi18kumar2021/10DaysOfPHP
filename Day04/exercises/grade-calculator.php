<?php
class GradeCalculator {
    public function calculate($marks) {
        if ($marks < 0 || $marks > 100) {
            return "Invalid marks";
        }
        elseif ($marks >= 90) return "A";
        elseif ($marks >= 75) return "B";
        elseif ($marks >= 60) return "C";
        elseif ($marks >= 40) return "D";
        else return "Fail";
    }
}
$gc = new GradeCalculator();
echo $gc->calculate(93);
?>