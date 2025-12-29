<?php
session_start();

session_unset();
session_destroy();

echo "user logged out";
echo "<br>";

if (isset($_SESSION['user'])) {
    echo "user : ".$_SESSION['user'];
} else {
    echo "no user found";
}
?>