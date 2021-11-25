<!DOCTYPE html>
<html lang="en">
<head>

    <title>Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'cartdb');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$options = "";
$selectcat = "";


$sql = "select distinct category from cart";
$rs = mysqli_query($conn, $sql);

if (isset($_GET['selectcat']))
    $selectcat = $_GET['selectcat'];

while ($row = mysqli_fetch_array($rs)) {
    if ($selectcat == $row[0])
        $options = $options . "<option selected>$row[0]</option>";
    else
        $options = $options . "<option >$row[0]</option>";
}
mysqli_close($conn);

?>
<form method="GET" id="selectcategory">
        <div class="dropdown" >
            <select name="selectcat">
                <option selected>Select Category Of Vehicle</option>
                <div class="dropdown-content">
                    <?php
                    if (isset($options))
                        echo $options;

                    ?>
                    
                </div>
            </select>
        </div>

<div class="container">
    <table id="userTable" border="1" >
     <tbody><br><br>
       <tr>
         <th>Sr. No</th>
         <th>Product Id</th>
         <th>Name</th>
         <th>Price</th>
       </tr>
     </tbody>
    </table>
 </div>
 <script src="fetch.js"></script>
</body>
</html>