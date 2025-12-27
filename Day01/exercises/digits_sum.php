<?php
$num = 4563;
$temp = $num;
$sum = 0;
while ($temp > 0) {
    $rem = $temp % 10;
    $sum = $sum + $rem;
    $temp = intval($temp / 10);
}
echo "Sum of digits of $num = $sum";
?>