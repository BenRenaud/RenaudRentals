<?php
    require('db.php');
    session_start();
    if (isset($_POST['email'])) {
        $username = stripslashes($_REQUEST['email']);
        $username = mysqli_real_escape_string($connect, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $query    = "SELECT * FROM `customer` WHERE email='$username' AND password='" . md5($password) . "'";
        $result = mysqli_query($connect, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $_SESSION['email'] = $username;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['ban'] = $row['ban'];
            header("Location: games.php?console=All");
            exit();
        } 
        else {
            echo "<div class='form' style='width:800px; margin:0 auto;'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Try to <a href='login.php'>login again</a> or <a href='register.php'>register </a>an account if you do not have one.</p>
                  </div>";
        }
    } else {
    }
?>
<html>
<head>
    <?php include 'head.php'; ?>
    <link href="../css/signin.css" rel="stylesheet">
  </head>
<body class=text-center>
    <?php $page = 'login'; include 'navbar.php'; ?>
     <form class="form-signin border rounded-lg" method="post" name="login">
        <br>
        <br>
        <br>
        <img class="mb-4" src="../pics/big-icon.png" alt="" width="200" height="200">
        <h1 class="h3 mb-3 font-weight-normal login-title">Log-in:</h1>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" class="login-input form-control" name="email" placeholder="E-mail Address" autofocus="true"/>
        <label for="password" class="sr-only">Password</label>
        <input type="password" class="login-input form-control" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="btn btn-lg btn-primary btn-block login-button"/>
        <br>
        <p class="link"><a href="register.php">New to RenaudRentals? Register here!</a></p>
        <p class="link"><a style="color:#341f97" href="adminlogin.php">Login as an Admin here</a></p>
  </form>
</body>
</html>