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
    body {background-color: powderblue;}
  h1   {color: blue;}
  p    {color: red;}
    input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
   display: inline-block;}

</style>
</head>
<body>
   <div class="container">
  <form action="action_page.php">

    <div class="content">
    <h1>Sign Up</h1>
    <p>Please Enter Your details and password</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

    <label for="pwd-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pwd-repeat" id="pwd-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Conditions</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Sign In Instead? <a href="#">Click Here</a>.</p>
  </div>

</form>
  </div>

</body>
</html>