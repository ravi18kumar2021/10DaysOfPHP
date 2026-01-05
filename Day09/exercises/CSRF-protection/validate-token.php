<?php
session_start();
if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
    if (!isset($_POST['username'])) {
        header("Location: generate-token.php");
        exit;
    } else {
        echo 'Welcome ' . $_POST['username'];
    }
} else {
    echo "CSRF detected";
}
?>