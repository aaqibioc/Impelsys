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
  // if (isset($_GET['reset'])){
  //   header ('forgot.php');
  // }
    $email = "";
    $password = "";
    if(isset($_COOKIE['email']))
    $email = $_COOKIE['email'];
    if(isset($_COOKIE['password']))
    $password = $_COOKIE['password'];
  if (isset($_GET['submit'])) {

    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASSWORD', 'root');
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_NAME', 'login');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);




    if (isset($_GET['email']) && isset($_GET['pwd'])) {
      $email = $_GET['email'];
      $pwd = $_GET['pwd'];


      $sql = "SELECT COUNT(DISTINCT email) FROM users where email ='$email'";
      $sql1 = "SELECT email, pwd from users where email ='$email'";
      $rs = mysqli_query($conn, $sql);
      $result = mysqli_query($conn, $sql1);
      $flag = 0;
      $row = mysqli_fetch_array($rs);
      $row1 = mysqli_fetch_array($result);


      // echo $row1[0], $row1[1];  

      if ($row[0] == 1)
        $flag = 1;
      else
        $flag = 0;

      if (($flag == 1) && password_verify($pwd, $row1[1])) {
        if(!empty($_GET["remember"])) {
          setcookie ("email",$email,time()+ 3600);
          setcookie ("password",$pwd,time()+ 3600);
          echo "Cookies Set Successfuly";
        } elseif(empty($_GET["remember"])) {
          setcookie("email","");
          setcookie("password","");
          echo "Cookies Not Set";
        }
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: products.php");
      }
       else if ($email == $row1[0] && !password_verify($pwd, $row1[1])) /*&& $pwd <> $row1[1])*/ {
        echo "Password Incorrect, Please try again or <a href='forgot.php'>Reset Your Password.</a>";
      } 
      else {
        echo "Number of users found = " . $row[0];
        echo "<br>User Doesn't exist";
      }
      mysqli_close($conn);
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