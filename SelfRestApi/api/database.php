<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'phpapidb');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Connection failed");



    // class Database {
    //     private $host = "localhost";
    //     private $database_name = "phpapidb";
    //     private $username = "root";
    //     private $password = "root";

    //     public $conn;

    //     public function getConnection(){
    //         $this->conn = null;
    //         try{
    //             $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
    //             $this->conn->exec("set names utf8");
    //         }catch(PDOException $exception){
    //             echo "Database could not be connected: " . $exception->getMessage();
    //         }
    //         return $this->conn;
    //     }
    // }  

?>