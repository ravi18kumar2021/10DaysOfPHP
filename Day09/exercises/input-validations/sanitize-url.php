<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!$id) {
    echo "Invalid ID";
} else {
    echo "ID : ". $id;
}
?>