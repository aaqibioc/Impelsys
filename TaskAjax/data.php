<?php
header('Content-type: text/javascript');


$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "cartdb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
$return_arr = array();
$query = "SELECT productId, productName, price, category FROM cart";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $productId = $row['productId'];
    $productName = $row['productName'];
    $price = $row['price'];
    $category = $row['category'];
    $return_arr[] = array("productId" => $productId,
    "productName" => $productName,
    "price" => $price,
    "category" => $category,
    );
}
//print_r ($return_arr);
// Encoding array in JSON format
echo json_encode($return_arr,JSON_PRETTY_PRINT);
