<?php
require('db.php');
session_start();
if(isset($_GET['gameName'])){
    require('db.php');
    $rented = 0;
    $gameName = mysqli_real_escape_string($connect, $_GET['gameName']);
    $time = mysqli_real_escape_string($connect, $_GET['time']);
    $price = mysqli_real_escape_string($connect, $_GET['price']);
    $gameImage = mysqli_real_escape_string($connect, $_GET['gameImage']);
    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM rental WHERE gameName='$gameName' AND userID=$userID";
    $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
    $row = mysqli_num_rows($result);
    
    if($row == 0){
        $sql = "SELECT * FROM rental WHERE userID=$userID";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
        $checkrow = mysqli_num_rows($result);
        if ($checkrow < 3){
        $query = "INSERT into `rental` (userID, gameName, gameImage, price, time) VALUES ($userID, '$gameName', '$gameImage', '$price', '$time')";
        $rented = 1;
        $result = mysqli_query($connect, $query);
        }

        else{
            $max = 1;
        }
    }
    else{
        $max = 0;
    }
}
?>

<html lang="en">
  <head>
    <?php $page = 'login'; include 'head.php'; ?>
    <link href="../css/album.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'navbar.php'; $userID = $_SESSION['userID'];?>
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
    <br>
      <h1>Hello <?php echo $_SESSION['firstName']; ?>!</h1>
      <p class="lead text-muted">Here you can view the games you are currently renting.</p>
      <?php  if($rented == 1){
        echo "<div class='form' style='color:#05c46b'><h3>Thank you for your purchase! Come and pick the game up at your earliest convience.</h3></p><br><p class='link'>Go back to <a href='games.php?console=All'>Games.</a></p>";
    } ?>
      <?php  if($_SESSION['ban'] == "Yes"){
        echo "<div class='form' style='color:#EA2027'><h3>You are banned, you cannot rent any further games at this time. <br><br> Contact an administrator to ask about releasing the ban.</p>";
    } ?>
      <?php  if($max == 1){
        echo "<div class='form' style='color:#f0932b'><h3>The max rental limit is three games. <br> You need to return a rental to start a new one.</h3><br/><p class='link'>Go back to <a href='games.php?console=All'>Games.</a></p>";
    } ?>
      <?php  if($row == 1){
        echo "<div class='form' style='color:#f0932b'><h3>You are currently renting " . $gameName . ".</h3><br/><p class='link'>Go back to <a href='games.php?console=All'>Games.</a></p>";
    } ?>
    <br>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php
        $sql = "SELECT * FROM rental WHERE userID=$userID";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
        if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="../pics/<?php echo $row['gameImage'] ?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text"><?php echo $row['gameName'] ?></p>
              <p class="card-text"><strong>Price: </strong><?php echo $row['price'] ?></p>
              <p class="card-text"><strong>Rental Time: </strong><?php echo $row['time'] ?></p>
              <p class="card-text"><strong>Date Rented: </strong><?php echo $row['dateOrdered'] ?></p>
              </div>
            </div>
          </div>
         <?php }
        }
        else {
            echo "No rentals currently active.";
        }
        mysqli_free_result($result); ?>
      </div>
    </div>
  </div>
</main>
<link href="../css/sticky-footer.css" rel="stylesheet">
 <?php include 'footer.php'; ?>
</body>
</html>