<?php
setcookie("username", "");
echo "cookie deleted";
echo "<br>";
if (isset($_COOKIE['username'])) {
    echo "Welcome ".$_COOKIE['username'];
} else {
    echo "cookie not found";
}
?>