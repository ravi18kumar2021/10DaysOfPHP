<?php
function isPrime($num) {
    $counter = 1;
    $found = FALSE;
    while ($counter < $num - 1) {
        $counter += 1;
        if ($num % $counter == 0) {
            $found = TRUE;
            break;
        }
    }
    return $found;
}
$num = 23;
$output = isPrime($num);
if ($output) {
    echo "$num is not a prime number";
} else {
    echo "$num is a prime number";
}
?>