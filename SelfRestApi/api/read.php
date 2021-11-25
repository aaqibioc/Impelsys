<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "database.php";
    $sql = "select * from Employee123";
    $result = mysqli_query($conn, $sql) or die("Sql failed");

    if(mysqli_num_rows($result)>0){
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    }
    else{
        echo json_encode(array('message' => 'No record found', 'status' => false));

    }


?>