<?php
$comment = "<script>alert('You are hacked')</script>";
// echo $comment; // don't display these things
echo htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
?>