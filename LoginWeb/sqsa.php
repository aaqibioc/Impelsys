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
if($conn == false)
{
	die("Server connection error");
}
$email=$_GET['email'];
$sa=$_GET['sa'];
$sq=$_GET['sq'];

$sql = "UPDATE users set sa = '$sa', sq = '$sq' where email = '$email'";	
$nor = mysqli_query($conn, $sql);
if($nor>0) 
  echo "<br>Security added, You can now  <a href='login.php'> LOG IN </a>";
else
	echo "Please try again";

mysqli_close($conn);
}

?>

<div class="container">
<form method ="get">

    <div class="content">
    <h1>Regiser Here</h1>
    <p>Add a security question and answer for added security</p>
    <hr>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="sq"><b>Security Question</b></label>
    <input type="text" placeholder="Security Question" name="sq" id="sq" required>

    <label for="sa"><b>Nnswer</b></label>
    <input type="text" placeholder="Enter the answer" name="sa" id="sa" required>
   


    <p>Remember this as it will help you reset your password.</p>
    <input type="submit" name="submit" value="Sign Up">
    
     </div>



</form>
  </div>

</body>
</html>