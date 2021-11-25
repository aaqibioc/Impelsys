<?php

$host = 'localhost';
$db = 'testdb';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            =>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   =>FALSE,
];
try{
    $pdo = new PDO($dsn, $user, $pass, $options);
    $bonus=[
        7369 =>2,
        7445 =>3,
        7521 =>4,
    ];
    $stmt = $pdo->prepare('update emp set sal = sal + ? where empno = ?');
    foreach($data as $id => $bonus)
    {
        $stmt   ->execute([$bonus, $id]);
    }
    echo "Updates";

}
catch(PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

?>
