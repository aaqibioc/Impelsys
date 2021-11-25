<?php
echo "<h1>Following items are there in your cart</h1>";

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'cartdb');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$str = "";
$sql = "SELECT productName  from cartItems";
$rs = mysqli_query($conn, $sql);
$empty = "";

  echo "<table border=1>";
  while($row = mysqli_fetch_array($rs))
      
      {
          $product=$row[0];

  
            echo "<tr><td>$product</td></tr>";
        }
        echo "<input method = 'get'>";
        echo "<input type='button' name='empty' value='Empty your cart'>";
        if (isset($_GET['empty']))
        {
            
        $sql1 = "Delete from cartItems;";
            $nor = mysqli_query($conn, $sql1);
            if ($nor > 0)
                echo "Removed";
            else
                echo "Not added. Try a";



    
    }

    //         echo "<td>" . "<input type='checkbox' name='select' value='$row[0]'>" . "</td>";
    //         echo "<input type='remove' name='remove' value='Remove>";
 
    //   if (isset($_GET['remove'])) {

    //     $rem = $_GET['select'];

    //     echo $rem;
    //    
        

      
      mysqli_close($conn);
    

