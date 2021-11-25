<html>

<head>
  <style>
    .content {
      margin: auto;
      text-align: center;
    }

    .container {
      width: 50%;
      margin-left: 25%;

    }

    body {
      background-color: #cca3ff;
    }

    h1 {
      color: blue;
    }

    p {
      color: red;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      display: inline-block;
    }
  </style>
</head>

<body>

  <?php

    $email = "";
    $password = "";
    if(isset($_COOKIE['email']))
    $email = $_COOKIE['email'];
    if(isset($_COOKIE['password']))
    $password = $_COOKIE['password'];


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
        $pdo = new PDO($dsn, $user, $pass, $options);


    if (isset($_GET['email']) && isset($_GET['pwd'])) {
        
      $email = $_GET['email'];
      $pwd = $_GET['pwd'];


      $statement = $pdo->prepare("SELECT COUNT(DISTINCT email) FROM users where email = :email");
        $statement->execute([
            ':email' => $email,]);
            $data = $statement->fetchAll(PDO::FETCH_NUM);

            
      $statement2 = $pdo->prepare("SELECT email, pwd from users where email =:email");
        $statement2->execute([
            ':email' => $email]);
        
            $data2 = $statement2->fetchAll();

      $flag = 0;
      $val = $data[0];
      // 
      if(!empty($data2)){
  $email1=$data2[0]["email"];
  $pwd1=$data2[0]["pwd"];
 
  if ($val[0] == 1)
  $flag = 1;
else
  $flag = 0;

if (($flag == 1) && password_verify($pwd, $pwd1)) {
  if(!empty($_GET["remember"])) {
    setcookie ("email",$email,time()+ 3600);
    setcookie ("password",$pwd,time()+ 3600);
    echo "Cookies Set Successfuly<br>";
  } elseif(empty($_GET["remember"])) {
    setcookie("email","");
    setcookie("password","");
    echo "Cookies Not Set<br>";
  }
  session_start();
  $_SESSION['loggedin'] = true;
  $_SESSION['email'] = $email;
  echo "Logged In";
}
 else if ($email == $email1 && !password_verify($pwd, $pwd1)) {
  echo "Password Incorrect, Please try again or <a href='forgot.php'>Reset Your Password.</a>";
} 

}


  // print_r($val[0]);
      
     
      else if($val[0]==0){
        echo "Number of users found = " . $val[0];
        echo "<br>User Doesn't exist";
      }
    }
  }
  ?>


  <div class="container">
    <form method="get">

      <div class="content">
        <h1>Please Sign In</h1>
        <p>Enter Your email and password</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email or username" name="email" id="email" required value = '<?=$email?>'>

        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required value = '<?=$password?>'>
        <br>
        </p>
        <p><input type="checkbox" name="remember" /> Remember me
        </p> <br>
        <input type="submit" name="submit" value="Log In">
        <br> Forgot password? Click
        <button onclick="window.location.href='forgot.php'">here</button>

      </div>

    </form>
  </div>

</body>

</html>