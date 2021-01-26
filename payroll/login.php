<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
     <link href="assets/must.png" rel="shortcut icon">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
   <br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Login Form</h1>
      <div>
        <input name=username type="text" placeholder="Enter Username" required>
        <!-- <input type="text" placeholder="Username" required="" id="username" /> -->
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
        <!-- <input type="password" placeholder="Password" required="" id="password" /> -->
      </div>
      <div>
        <input type="submit" value="Log in" />
        <!-- <a href="index.php">Back to Home</a> -->
        <!-- <a href="">Forgot password?</a> -->
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->


<?php } ?>


  </body>
</html>