<?php
require('db.php');
    if (isset($_REQUEST['firstName'])) {
        $firstName = stripslashes($_REQUEST['firstName']);
        $firstName = mysqli_real_escape_string($connect, $firstName);
        $lastName = stripslashes($_REQUEST['lastName']);
        $lastName = mysqli_real_escape_string($connect, $lastName);
        $email  = stripslashes($_REQUEST['email']);
        $email  = mysqli_real_escape_string($connect, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connect, $password);
        $number = stripslashes($_REQUEST['number']);
        $number = mysqli_real_escape_string($connect, $number);
        $credit = stripslashes($_REQUEST['credit']);
        $credit = mysqli_real_escape_string($connect, $credit);
        $expiration_date = stripslashes($_REQUEST['expiration_date']);
        $expiration_date = mysqli_real_escape_string($connect, $expiration_date);
        $cvv = stripslashes($_REQUEST['cvv']);
        $cvv = mysqli_real_escape_string($connect, $cvv);
        $query = "INSERT into `customer` (firstName, lastName, email, password, number, credit_card, expiration_date, cvv) VALUES ('$firstName', '$lastName', '$email', '" . md5($password) . "', '$number', '$credit', '$expiration_date', '$cvv')";
        $result = mysqli_query($connect, $query);
        
        if ($result) {
            echo "<div class='form' style='width:800px; margin:0 auto;'>
                  <h3>You have been registered successfully!</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>login.</a></p>
                  </div>";
        } else {
            echo "<div class='form' style='width:800px; margin:0 auto;'>
                  <h3>Something went wrong registering you.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>register</a> again.</p>
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
        <h1 class="h3 mb-3 font-weight-normal login-title">Register an Account:</h1>
        <label for="firstName" class="sr-only">First Name</label>
        <input type="text" class="login-input form-control" name="firstName" placeholder="First name" autofocus="true" required/>
        <label for="LastName" class="sr-only">Last Name</label>
        <input type="text" class="login-input form-control" name="lastName" placeholder="Last name" autofocus="true" required/>
        <label for="email" class="sr-only">Email address</label>
        <input type="text" class="login-input form-control" name="email" placeholder="E-mail Address" autofocus="true" required/>
        <label for="password" class="sr-only">Password</label>
        <input type="password" class="login-input form-control" name="password" placeholder="Password" minlength="8" autofocus="true" required/>
        <label for="number" class="sr-only">Phone Number</label>
        <input type="text" class="login-input form-control" name="number" placeholder="Phone Number" minlength="10" autofocus="true" required/>
        <label for="credit" class="sr-only">Creditcard</label>
        <input class="login-input form-control" id="credit" name='credit' type="text" minlength="16" maxlength="19" placeholder="XXXX-XXXX-XXXX-XXXX" required>
        <label for="expiration_date" class="sr-only">Expiration Date</label>
        <input type="text" class="login-input form-control" name="expiration_date" placeholder="Expiration Date" minlength="5" maxlength="5" autofocus="true" required/>
        <label for="cvv" class="sr-only">CVV</label>
        <input type="text" class="login-input form-control" name="cvv" placeholder="CVV" minlength="3" maxlength="3" autofocus="true" required/>
        <br>
        <input type="submit" value="Register" name="submit" class="btn btn-lg btn-primary btn-block login-button"/>
        <br>
        <p class="link"><a href="login.php">Go back to login</a></p>
    </form>
  </div>
</body>
</html>