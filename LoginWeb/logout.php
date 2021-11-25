<?php
session_start();
session_unset();
session_destroy();
echo "You are now Logged out <br>";

echo "<br> <a href= 'login.php'>Login again</a>";

?>