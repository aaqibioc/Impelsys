<?php
// session_start();
// if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
//     echo "<p align = center><img src=wel.gif></p>";

//     echo "<h1><p align = center>You are logged in as  $_SESSION[email]</p></h1>";

//     echo "<p align= right> <a href = 'logout.php'>Click here </a> to Logout</p>";
//     echo "<button><a href=cart.php>View Cart</a></button>";
// } else
//     header("location: login.php");

?>

<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'cartdb');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$string = "";
if (isset($_GET['selectcat'])) {
    $cat = $_GET['selectcat'];
    $sql = "SELECT productId, productName, price  from cart where category = '$cat'";

    $rs = mysqli_query($conn, $sql);
    $string = "";
    while ($row = mysqli_fetch_array($rs)) {

        $string = $string . "<tr>";
        $string = $string . "<td>" . $row[0] . "</td>";
        $string = $string . "<td>" . $row[1] . "</td>";
        $string = $string . "<td>" . $row[2] . "</td>";
        $string = $string . "<td>" . "<input type='checkbox' name='addtocart' value='$row[1]'>" . "</td>";
        // <input type="submit" name="submit" value="Add">
        $string = $string . "</tr>";
    }

    if (isset($_GET['submit'])) {

        $cart = $_GET['addtocart'];
        // echo $cart;
        $sql1 = "insert into cartItems (productName) values( '$cart' )";
        $nor = mysqli_query($conn, $sql1);
        if ($nor > 0)
            echo "Item added to cart, <a href=cart.php>View Cart</a>";
        else
            echo "Not added. Try again";
    }

    mysqli_close($conn);
} else {

    $sql = "SELECT productId, productName, price  from cart";

    $rs = mysqli_query($conn, $sql);
    $string = "";
    while ($row = mysqli_fetch_array($rs)) {

        $string = $string . "<tr>";
        $string = $string . "<td>" . $row[0] . "</td>";
        $string = $string . "<td>" . $row[1] . "</td>";
        $string = $string . "<td>" . $row[2] . "</td>";
        $string = $string . "<td>" . "<input type='checkbox' name='addtocart' value='$row[1]'>" . "</td>";
        // <input type="submit" name="submit" value="Add">
        $string = $string . "</tr>";
    }

    if (isset($_GET['submit'])) {

        $cart = $_GET['addtocart'];
        // echo $cart;
        $sql1 = "insert into cartItems (productName, email) values( '$cart', '$_SESSION[email]' )";
        echo "$sql1";
        $nor = mysqli_query($conn, $sql1);
        if ($nor > 0)
            echo "Item added to cart, <a href=cart.php>View Cart</a>";
        else
            echo "Not added. Try again";
            echo "$sql1";
    }

    mysqli_close($conn);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$options = "";
$selectcat = "";


$sql = "select distinct category from cart";
$rs = mysqli_query($conn, $sql);
// print_r(mysqli_fetch_array($rs));

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


<html>

<head>
    <style>
        body {
            background-color: #cca3ff;
        }

        table,
        th,
        td {
            border: 1px solid white;
            border-collapse: collapse;
        }

        th,
        td {
            background-color: #96D4D4;
        }
    </style>
</head>

<body>
    <form method="GET">
        <div class="dropdown">
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

        <button>Show Products</button>

        <table style="width:50%">

            <tr>
                <th>Product Id</th>
                <th>Brand</th>
                <th>Price (in Rupees)</th>
            </tr>
            <?php
            if (isset($string))
                echo $string;
            ?>
        </table>
        <input type="submit" name="submit" value="Add to cart">
    </form>
</body>

</html>