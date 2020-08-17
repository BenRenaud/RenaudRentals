<?php
require('db.php');
    if (isset($_REQUEST['firstName'])) {
        $firstName = stripslashes($_REQUEST['firstName']);
        $firstName = mysqli_real_escape_string($connect, $firstName);
        $lastName = stripslashes($_REQUEST['lastName']);
        $lastName = mysqli_real_escape_string($connect, $lastName);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($connect, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $query    = "INSERT into `employee` (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '" . md5($password) . "')";
        $result   = mysqli_query($connect, $query);
        if ($result) {
            echo "<div class='form' style='width:800px; margin:0 auto;'>
                  <h3>The Admin has been registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='adminaccount.php'>return to the Admin account page.</a></p>
                  </div>";
        } else {
            echo "<div class='form' style='width:800px; margin:0 auto;'>
                  <h3>Soemthing went wrong trying to register the Admin.</h3><br/>
                  <p class='link'>Click here to <a href='adminregister.php'>register</a> again.</p>
                  </div>";
        }
    } else {
}
?>

<html lang="en">
  <head>
    <?php $page = 'login'; include 'head.php'; ?>
    <link href="../css/signin.css" rel="stylesheet">
  </head>
<body class=text-center>
     <?php include 'navbar.php'; ?>
     <form class="form-signin border rounded-lg" name="login" method="post">
        <h1 class="h3 mb-3 font-weight-normal login-title">Register an Admin Account:</h1>
        <label for="firstName" class="sr-only">First Name</label>
        <input type="text" class="login-input form-control" name="firstName" placeholder="First name" autofocus="true" required/>
        <label for="LastName" class="sr-only">Last Name</label>
        <input type="text" class="login-input form-control" name="lastName" placeholder="Last name" autofocus="true" required/>
        <label for="email" class="sr-only">Email address</label>
        <input type="text" class="login-input form-control" name="email" placeholder="E-mail Address" autofocus="true" required/>
        <label for="password" class="sr-only">Password</label>
        <input type="password" class="login-input form-control" name="password" placeholder="Password" minlength="8" autofocus="true" required/>
        <input type="submit" value="Register" name="submit" class="btn btn-lg btn-primary btn-block login-button"/>
        <br>
        <p class="link"><a href="adminaccount.php">Go back to Admin account page</a></p>
    </form>
  </div>
</body>
</html>