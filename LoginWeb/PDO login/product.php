<?php
    $host = 'localhost';
    $db   = 'cartdb';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $string = "";
if (isset($_GET['selectcat'])) {
    
    $cat = $_GET['selectcat'];
    $pdo = new PDO($dsn, $user, $pass, $options);
    $sql = "SELECT productId, productName, price  from cart where category = :cat";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':cat' => $cat]);
        $data = $statement->fetchAll(PDO::FETCH_NUM);
        $string ="";
        foreach($data as $row){
            $string = $string . "<tr>";
            $string = $string . "<td>" . $row[0] . "</td>";
            $string = $string . "<td>" . $row[1] . "</td>";
            $string = $string . "<td>" . $row[2] . "</td>";
            $string = $string . "<td>" . "<input type='checkbox' name='addtocart' value='$row[1]'>" . "</td>";
            $string = $string . "</tr>";
        
        }
}



$pdo2 = new PDO($dsn, $user, $pass, $options);
$options = "";
$selectcat = "";


$sql2 = "select distinct category from cart";

$statement2 = $pdo2->prepare($sql2);
$statement2->execute();
$data2 = $statement2->fetchAll(PDO::FETCH_NUM);

// print_r($data2);


if (isset($_GET['selectcat']))
    $selectcat = $_GET['selectcat'];

foreach($data2 as $row) {
    // print_r($row[0]);
   
    if ($selectcat == $row)
        $options = $options . "<option selected>$row[0]</option>";
    else
        $options = $options . "<option >$row[0]</option>";
}


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