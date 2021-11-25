<?php
header('Content-type: text/javascript');


$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "testdb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
$return_arr = array();
$query = "SELECT empno, ename, job, sal, deptno FROM emp";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $empno = $row['empno'];
    $ename = $row['ename'];
    $job = $row['job'];
    $sal = $row['sal'];
    $deptno = $row['deptno'];
    $return_arr[] = array("empno" => $empno,
    "ename" => $ename,
    "job" => $job,
    "salary" => $sal,
    "deptno" => $deptno);
}
//print_r ($return_arr);
// Encoding array in JSON format
echo json_encode($return_arr,JSON_PRETTY_PRINT);
