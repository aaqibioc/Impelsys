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
            $fullname = $_GET['fullname'];
            $pwd = $_GET['pwd'];
            $mobile = $_GET['mobile'];
            $hash = password_hash($pwd, PASSWORD_DEFAULT);

            $a_type = $_GET["a_type"];

            $name3 = substr("$fullname",0,3);
            $mob3 = substr("$mobile",0,3);
            $fletter = substr("$a_type",0,1);
            $userid = strtoupper($fletter.$name3.$mob3); 
            


            $statement = $pdo->prepare('INSERT INTO user_account (user_id, name, pwd, mobile, atype) VALUES (:userid, :fullname, :pwd, :mobile, :a_type)');

            $statement->execute([
                ':userid' => $userid,
                ':fullname' => $fullname,
                ':pwd' => $hash,
                ':mobile' => $mobile,
                ':a_type' => $a_type
            ]);

            echo "User ID: ".$userid." Regitered Successfully";
        }
       
    ?>

    <div class="container">
        <form method="get">

            <div class="content">
                <h1>Regiser Here</h1>
                <p>Please Enter Your details</p>
                <hr>

                <label for="email"><b>Account Type: </b></label>
                <input type="radio" id="seller" name="a_type" value="Seller">
                <label for="Seller">Seller</label>
                <input type="radio" id="buyer" name="a_type" value="Buyer" checked>
                <label for="buyer">Buyer</label><br><br>

                <label for="fullname"><b>Full Name here</b></label>
                <input type="text" placeholder="Enter your full name" name="fullname" id="fullname" required>

                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

                <label for="mobile"><b>Mobile Number</b></label>
                <input type="text" placeholder="Enter your Mobile No." name="mobile" id="mobile" required>


                <p>By creating an account you agree to our <a href="Conditions.php">Terms & Conditions</a>.</p>
                <input type="submit" name="submit" value="Sign Up">

            </div>

            <div class="container signin" align=center>
                <p>Sign In Instead? <a href="assiLogin.php">Click Here</a>.</p>
            </div>


        </form>
    </div>

</body>

</html>