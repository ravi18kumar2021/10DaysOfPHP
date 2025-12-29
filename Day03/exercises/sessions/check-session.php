<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "user : ".$_SESSION['user'];
    echo "<br>".session_id();
} else {
    echo "no user found";
}
?>