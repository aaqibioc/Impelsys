<html>
<head>
<style>
  .content{
  margin: auto;
  text-align: center;
  }
  .container{
    width: 50%;
    margin-left: 25%;

  }
    body {background-color: powderblue;}
  h1   {color: blue;}
  p    {color: red;}
    input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
   display: inline-block;}

</style>
</head>
<body>

<?php

if(isset($_GET['submit'])){

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'login');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);




    if(isset($_GET['email']) && isset($_GET['pwd']) && isset($_GET['cnfpwd']))
	{
		$email=$_GET['email'];
		$pwd=$_GET['pwd'];
        $cnfpwd=$_GET['cnfpwd'];
             $sql="SELECT email, pwd from users where email ='$email'";
             $rs=mysqli_query($conn, $sql);
             $row=mysqli_fetch_array($rs);
             if($email == $row[0]){
                 if($pwd == $cnfpwd){
                    $sql1 = "UPDATE users set pwd = '$pwd' where email = '$email'";
                    $x = mysqli_query($conn, $sql1);
                    if($x > 0)
                        echo "<br> Password changed successfully";
                    }
                    
                else 
                    echo "Password do not match, try again";
                }
                    
             else 
                echo "User Not found";
          
        mysqli_close($conn);
    }
}

?>


   <div class="container">
  <form method="get">

    <div class="content">
    <h1>Reset your password</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

    <label for="cnfpwd"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cnfpwd" id="cnfpwd" required>
       <br> <br>

    <input type="submit" name="submit" value="Change Password">
  </div>

</form>
  </div>

</body>
</html>