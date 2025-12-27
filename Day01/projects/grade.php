<?php
if (!isset($_GET['marks'])) {
    echo "Missing parameter";
    exit;
}
$marks = intval($_GET['marks']);
if ($marks >= 90 && $marks <= 100) {
    echo "Grade A";
} elseif ($marks >= 75) {
    echo "Grade B";
} elseif ($marks >= 60) {
    echo "Grade C";
} elseif ($marks >= 40) {
    echo "Grade D";
} else {
    echo "Fail";
}
?>