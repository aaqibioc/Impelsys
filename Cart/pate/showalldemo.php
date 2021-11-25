
<?php
require_once('shodeptdemo.php');
?>
<html>
<head>
 <script type="text/javascript">
// function showDept()
// {
// 	document.form1.submit();
// }

</script>
<style>
	body{
	background-color: palevioletred;
	text-align: center;

}
</style>	 

</head>
<body>
<form method="get" action="" name="form1">
<!-- Dept :<input type=text size=10 name="dept" 
value='
<?php 
if(isset($_GET['dept']))
   echo $_GET['dept'];
?>
'>
<input type="submit" name="submit" value="Show"> -->

<p align="right" ><a href="logoutmain.php">Logout</a></p>

<select name="selectdept" onchange="showDept()">
<option>Select Product</option>
<?php
if(isset($options))
	echo $options;

?>
</select>
<input type="submit" name="show" value="Show">
<table border=1 bgcolor='white'>
<?php
if($str1!=="")
{
	echo $str1;

}
?>
</table>
<?php
if(isset($errormsg1))
	if($errormsg1!="")
		echo "<font color=red>$errormsg1</font>";
if($str2!=="")
   echo $str2;

?>








</form>
</body>
</html>
