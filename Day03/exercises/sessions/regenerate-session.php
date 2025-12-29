<?php
session_start();
echo "Old session ID : ".session_id();
session_regenerate_id(TRUE);
echo "<br>";
echo "New session ID : ".session_id();
?>