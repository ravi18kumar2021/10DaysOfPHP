<?php
$comment = "<html>Hello <b>comment</b> contains <br /> tags</html>";
echo htmlspecialchars($comment);
echo "<br>";
echo strip_tags($comment);
?>