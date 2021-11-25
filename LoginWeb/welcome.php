<?php
session_start();
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
echo "<img src=welcome.gif>";
echo "<br>Welcome you are logged in as ". $_SESSION['email'];

echo "<br> <br> <a href = 'logout.php'>Click here </a> to Logout";
}

else 
header("location: login.php");

?>