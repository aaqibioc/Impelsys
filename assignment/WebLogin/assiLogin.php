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

    $userid = "";
    $password = "";


    if (isset($_GET['submit'])) {
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


        if (isset($_GET['userid']) && isset($_GET['pwd']) && isset($_GET['a_type'])) {

            $userid = $_GET['userid'];
            $pwd = $_GET['pwd'];
            $atype = $_GET['a_type'];
        

            $statement = $pdo->prepare("SELECT user_id, pwd, atype, name, mobile from user_account where user_id =:userid");
            $statement->execute([
                ':userid' => $userid
            ]);

            $data = $statement->fetchAll();

            $flag = 0;
            
            if (!empty($data)) {
                $userid1 = $data[0]["user_id"];
                $pwd1 = $data[0]["pwd"];
                $atype1 = $data[0]["atype"];
                $name = $data[0]["name"];
                $mobile = $data[0]["mobile"];
               
                // echo $userid1, $pwd1, $atype1;

                if (($userid1 == $userid) && password_verify($pwd, $pwd1) && ($atype1 == $atype)) {
                
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $name;
                    $_SESSION['mobile'] = $mobile;
                    if($atype1 == 'Buyer')
                    header("Location: buy.php");
                    else if ($atype1 == 'Seller')
                    header("Location: sell.php");
                } else if ($userid == $userid1 && !password_verify($pwd, $pwd1)) {
                    echo "Password Incorrect, Please try again.";
                }
                else if (($userid1 == $userid) && password_verify($pwd, $pwd1) && ($atype1 <> $atype)) {
                    echo "<br>Account Type doesn't match";
                }
            }
            else
            echo "User ID Not Found";

        }
    }
    ?>


    <div class="container">
        <form method="get">

            <div class="content">
                <h1>Please Sign In</h1>
                <p>Enter Your userid and password</p>
                <hr>

                <label for="userid"><b>User Id</b></label>
                <input type="text" placeholder="Enter user id" name="userid" id="userid" required value='<?= $userid ?>'>

                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required value='<?= $password ?>'>
                <br><br>

                <label for="a_type">Account Type: </label>

                <select name="a_type" id="a_type">
                    <option value="Buyer">Buyer</option>
                    <option value="Seller">Seller</option> 
                </select>
                </p>
                <input type="submit" name="submit" value="Log In">

            </div>

        </form>
    </div>

</body>

</html>