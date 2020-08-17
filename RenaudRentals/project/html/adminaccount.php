<?php
require('db.php');
session_start();
if (isset($_GET['rentalID'])) {
    $rentalID = mysqli_real_escape_string($connect, $_GET['rentalID']);
    $employeeID = $_SESSION['employeeID'];
    $firstName = $_SESSION['firstName'];
    $sql = "DELETE FROM rental WHERE rentalID=$rentalID";
    $result= mysqli_query($connect, $sql) or ("Bad Query: $sql");
    header('Location: adminaccount.php');
    }
    
    if (isset($_GET['ban'])) {
        
    if($_GET['ban'] == 'No'){
    $userID = mysqli_real_escape_string($connect, $_GET['userID']);
    $sql = "UPDATE customer SET ban='Yes' WHERE userID=$userID";
    $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
    header('Location: adminaccount.php');
    }
    
    else{
    $userID = mysqli_real_escape_string($connect, $_GET['userID']);
    $sql = "UPDATE customer SET ban='No' WHERE userID=$userID";
    $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
    header('Location: adminaccount.php');
        }
    }
    
    else if (isset($_GET['userID'])) {
    $userID = mysqli_real_escape_string($connect, $_GET['userID']);
    $sql = "DELETE FROM customer WHERE userID=$userID";
    $result= mysqli_query($connect, $sql) or die("<div class='form' style='color:#ee5253'><h3>You cannot delete this user since they have active rentals. Delete the rentals attached to the account if you still wish to remove the user.<br> Please go back to the previous page.</h3>");
    header('Location: adminaccount.php');
    }
?>

<html lang="en">
  <head>
    <?php $page = 'login'; include 'head.php'; ?>
    <link href="../css/album.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'navbar.php'; $employeeID = $_SESSION['employeeID'];?>
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
    <br>
      <h1>Welcome Admin <?php echo $_SESSION['firstName']; ?>!</h1>
      <?php  if($delete == 1){
        echo "<div class='form' style='color:#ff9f43'><h3>You cannot delete this user since they have active rentals.</h3></p><br><p Delete the rentals attached to the account if you still wish to remove the user.</p>";} ?>
      <br>
      <p class="lead text">These are the functions available for Admins:</p><strong>
      <p class="link"><a href="addgame.php" style="color:#6c5ce7">(Add new games into the database)</a></p>
      <p class="link"><a href="adminregister.php" style="color:#6c5ce7">(Register a new Admin into the database)</a></p>
       <p class="link"><a href="gamestock.php" style="color:#6c5ce7">(Change the availability of game stock in the database)</a></p></strong>
      <br>
      <br>
    </div>
    </section>
  <section class="text-center">
  <div class="container">
      <h1>Active Customer Rentals</h1>
      <p class="lead text-muted">You can view and end the active rentals for all customers of RenaudRentals.</p>
      <br>
    </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php
        $sql = "SELECT * FROM rental";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
        if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="../pics/<?php echo $row['gameImage'] ?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text"><?php echo $row['gameName'] ?></p>
              <p class="card-text"><strong>UserID: </strong><?php echo $row['userID'] ?></p>
              <p class="card-text"><strong>Price: </strong><?php echo $row['price'] ?></p>
              <p class="card-text"><strong>Rental Time: </strong><?php echo $row['time'] ?></p>
              <p class="card-text"><strong>Date Rented: </strong><?php echo $row['dateOrdered'] ?></p>
            <a type="button" class="btn btn-danger" name="EndRental" href="adminaccount.php?rentalID=<?php echo $row['rentalID']?>">End Rental</a>
              </div>
            </div>
          </div>
         <?php }
        }
        else {
            echo "No rentals found.";
        }
        mysqli_free_result($result); ?>
      </div>
    </div>
  </div>
  </section>
  <br>
  <section class="text-center">
  <div class="container">
      <h1>Active Customers</h1>
      <p class="lead text-muted">You can view, delete or ban the active customers of RenaudRentals.</p>
      <br>
    </div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Credit Card</th>
      <th scope="col">Expiration Date</th>
      <th scope="col">CVV</th>
      <th scope="col">Banned</th>
      <th scope="col">Delete User</th>
    </tr>
  </thead>
  <?php
        $sql = "SELECT * FROM customer";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
        if(mysqli_num_rows($result) > 0) { ?>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <th scope="row"><?php echo $row['userID'] ?></th>
      <td><?php echo $row['firstName'] ?></td>
      <td><?php echo $row['lastName'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['number'] ?></td>
      <td><?php echo $row['credit_card'] ?></td>
      <td><?php echo $row['expiration_date'] ?></td>
      <td><?php echo $row['cvv'] ?></td>
      <td style="color:red"><?php echo $row['ban'] ?> <br><br> <a type="button" class="btn btn-warning" name="deleteUser" href="adminaccount.php?userID=<?php echo $row['userID']?>&ban=<?php echo $row['ban']?>">Ban/Unban User</a></td>
      <td><a type="button" class="btn btn-danger" name="deleteUser" href="adminaccount.php?userID=<?php echo $row['userID']?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</section>
<?php
} ?>
</main>
<link href="../css/sticky-footer.css" rel="stylesheet">
 <?php include 'footer.php'; ?>
</body>
</html>