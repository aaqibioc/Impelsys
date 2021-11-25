<style>
    body {
            background-color: #cca3ff;
        }
        </style>
<?php
session_start();
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
echo "<img src=wel.gif><br>";
echo "  <br>Welcome you are logged in as : ". $_SESSION['name'] .". You are a Seller.<br><br> Your Mobile Number is: ". $_SESSION['mobile'] ;

echo "<br> <br> <a href = 'logout.php'>Click here </a> to Logout";
}

else 
header("location: assiLogin.php");

?>