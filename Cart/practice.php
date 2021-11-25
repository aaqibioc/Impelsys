<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'testdb');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$str = "";
if (isset($_GET['selectdept'])) {
  $deptno = $_GET['selectdept'];
  $sql = "SELECT job,empno,ename,sal  from emp where deptno=$deptno";

  $rs = mysqli_query($conn, $sql);
  $str = "";
  while ($row = mysqli_fetch_array($rs))
   {
    $str = $str . "<tr>";
    $str = $str . "<td>" . $row[0] . "</td>";
    $str = $str . "<td>" . $row[1] . "</td>";
    $str = $str . "<td>" . $row[2] . "</td>";
    $str = $str . "<td>" . $row[3] . "</td>";

    $str = $str . "</tr>";
  }

  mysqli_close($conn);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$options = "";
$sd = "";


$sql = "select distinct deptno from emp";
 $rs = mysqli_query($conn, $sql);

if (isset($_GET['selectdept']))
  $sd = $_GET['selectdept']; //Drop Down values

while ($row = mysqli_fetch_array($rs)) {
  if ($sd == $row[0])
    $options = $options . "<option selected>$row[0]</option>";
  else
    $options = $options . "<option >$row[0]</option>";
}
mysqli_close($conn);

?>


<html>

<head>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>

<body>
  <form method="GET">
  <select name="selectdept">
      <option selected>Select Department</option>
      <?php
      if (isset($options))
        echo $options;

      ?>
    </select>
    
    <button>Show Table</button>
    <table border=5 bgcolor='cyan'>
      <?php
      if (isset($str))
        echo $str;
      ?>
    </table>
  </form>
</body>

</html>