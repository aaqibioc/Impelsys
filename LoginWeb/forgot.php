
<?php
$errmsg="";
$content="";
$email="";
if(isset($_GET['submit']))
{
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', 'root');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'login');
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $email=$_GET['email'];

        $sql = "select email, sq, sa from users where email='$email'";
        // echo $sql;		
        $rs = mysqli_query($conn, $sql);
        $flag=false;
        $sq="";
        $sa="";

        while($row= mysqli_fetch_assoc($rs)) 
        {
            $flag=true;
            $sq=$row['sq'];
            $sa=$row['sa'];
        }
        mysqli_close($conn);

        if($flag==true)
        {
        $content="<br><span> $sq</span><br>Answer:<input type='text' size='10' name='ans'>";
        $content=$content."<input type=submit name='submit_ans' value='Submit'>";
        }
        else
        {
        $errmsg="<font color=red>Email Id  is invalid";
        }
}
if(isset($_GET['submit_ans']))
{
$answer=trim($_GET['ans']);
$email=trim($_GET['email']);
$conn = mysqli_connect('localhost', 'root', 'root', 'login');
$sql = "select sa from users where email='$email'";
//echo $sql;		
$rs = mysqli_query($conn, $sql);
$sa=""; //

while($row=mysqli_fetch_assoc($rs)) 
 {

	$sa=$row['sa']; 
	// echo $sa;
 }
//  echo $answer.":".$sa;
 mysqli_close($conn);
 $flag2 = false;
   if(trim($answer)==trim($sa)){
        $flag2 = true;
   	 header('location:resetpwd.php');
   }
   	else
   		$errmsg="Answer is not correct.";

    // if ($flag2 == true)
    //     include'resetpwd.php';
}
?>

<html>
<head>
<style>

    body {background-color: powderblue;}
  h1   {color: blue;}
  p    {color: red;}
    input[type=text], input[type=text] {
  width: 50%;
  padding: 10px;
   display: inline-block;}
</style>
</head>
<body>
	<form method="get">
        <h1>Reset your password</h1>
	Enter your email id : <input type="text" size=20 name="email" value='<?=$email?>'><br>
	<input type=submit name="submit" value="Submit">
     
     <?php
      if($errmsg!="")
      	echo $errmsg;
      if($content!="")
      	echo $content;
     ?>

</form>
</body>
</html>