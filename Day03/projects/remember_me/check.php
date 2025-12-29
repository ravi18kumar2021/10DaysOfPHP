<?php
if (isset($_COOKIE['remember_me'])) {
    echo "Welcome " . $_COOKIE['remember_me'];
}
?>