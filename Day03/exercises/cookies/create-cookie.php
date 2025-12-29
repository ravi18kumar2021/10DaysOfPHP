<?php
setcookie("username", "ravi", time() + 20);
echo "cookie has been set";
echo "<br>";
if (isset($_COOKIE['username'])) {
    echo "Welcome ".$_COOKIE['username'];
} else {
    echo "cookie not found";
}
?>