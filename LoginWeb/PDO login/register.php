<html>
<head>
<style>
    .content{
  margin: auto;
  text-align: center;
  }
    .container{
    width: 50%;
    margin-left: 25%;
  }
    body {background-color: #cca3ff;}
  h1   {color: blue;}
  p    {color: red;}
    input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
   display: inline-block;}
</style>
</head>
<body>

<?php
if(isset($_GET['submit'])){
  $host = 'localhost';
  $db   = 'login';
  $user = 'root';
  $pass = 'root';
  $charset = 'utf8mb4';
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];


  try
{
     $pdo = new PDO($dsn, $user, $pass, $options);
     $email=$_GET['email'];
     $fullname=$_GET['fullname'];
     $city=$_GET['city'];
     $sex=$_GET['sex'];
     $pwd=$_GET['pwd'];
     $hash= password_hash($pwd, PASSWORD_DEFAULT);

    $statement = $pdo->prepare('INSERT INTO users (email, fullname, city, sex , pwd) VALUES (:email,:fullname,:city,:sex,:pwd)');

    $statement->execute([
      ':email' => $email,
       ':fullname' => $fullname,
       ':city' => $city,
       ':sex' => $sex,
       ':pwd' => $hash
    ]);

    echo "Regitered Successfully";
}
catch (PDOException $e) 
{
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}

}
?>

<div class="container">
<form method ="get">

    <div class="content">
    <h1>Regiser Here</h1>
    <p>Please Enter Your details and password</p>
    <hr>

    <label for="email"><b>Email or Username</b></label>
    <input type="text" placeholder="Enter Email or Username" name="email" id="email" required>

    <label for="fullname"><b>Full Name here</b></label>
    <input type="text" placeholder="Enter your full name" name="fullname" id="fullname" required>

    <label for="city"><b>Your city</b></label>
    <input type="text" placeholder="Enter your city" name="city" id="city" required>

    <label for="sex"><b>Enter your sex</b></label>
    <input type="text" placeholder="Male/Female" name="sex" id="sex" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

    

    <p>By creating an account you agree to our <a href="Conditions.php">Terms & Conditions</a>.</p>
    <input type="submit" name="submit" value="Sign Up">
    
  </div>

  <div class="container signin">
    <p>Sign In Instead? <a href="login.php">Click Here</a>.</p>
  </div>


</form>
  </div>

</body>
</html>