<?php
if(isset($_GET['console'])){
    require('db.php');
    $console = mysqli_real_escape_string($connect, $_GET['console']);
    $sql = "SELECT * FROM game WHERE console='$console'";
    $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
    $row = mysqli_fetch_array($result);
}

else{
    header('Location: games.php?console=All');
}
?>

<html lang="en">
  <head>
    <?php $page = 'games'; include 'head.php'; ?>
    <link href="../css/album.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
        <br>
      <h1>Game Directory</h1>
      <p class="lead text-muted">Choose what console you would like to rent games for:</p>
      <p>
        <a href="games.php?console=All" class="btn btn-info my-2">All Games</a>
        <a href="games.php?console=PS4" class="btn btn-primary my-2">PS4</a>
        <a href="games.php?console=Nintendo Switch" class="btn btn-danger my-2">Nintendo Switch</a>
        <a href="games.php?console=Xbox One" class="btn btn-success my-2">Xbox One</a>
        <a href="games.php?console=PS3" class="btn btn-primary my-2">PS3</a>
        <a href="games.php?console=Wii" class="btn btn-outline-dark my-2">Wii</a>
        <a href="games.php?console=Xbox 360" class="btn btn-success my-2">Xbox 360</a>
      </p>
      <br>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php
        if($console == "All"){
            $sql = "SELECT * FROM game";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
        }
        else{
        $sql = "SELECT * FROM game WHERE console='$console'";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
        }
        if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="../pics/<?php echo $row['image'] ?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text"><?php echo $row['gameName'] ?></p>
              <p class="card-text"><strong>Console: </strong><?php echo $row['console'] ?></p>
              <p class="card-text"><strong>Year: </strong><?php echo $row['year'] ?></p>
              <p class="card-text"><strong>Players: </strong><?php echo $row['players'] ?></p>
              <p class="card-text"><strong>Genre: </strong><?php echo $row['genre'] ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <?php if($row['inStock']=='1' && isset($_SESSION['userID']) && $_SESSION['ban'] == "No"){?>
            <div class="btn-group dropdown">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reserve</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="account.php?time=3 Days&price=$4.99&gameName=<?php echo $row['gameName']?>&gameImage=<?php echo $row['image'] ?>">3 Day Rental</a>
                <a class="dropdown-item" href="account.php?time=5 Days&price=$7.99&gameName=<?php echo $row['gameName']?>&gameImage=<?php echo $row['image'] ?>">5 Day Rental</a>
                <a class="dropdown-item" href="account.php?time=7 Days&price=$11.99&gameName=<?php echo $row['gameName']?>&gameImage=<?php echo $row['image'] ?>">7 Day Rental</a>
                </div>
                </div>
                 <?php }
                else { ?>
                <div class="btn-group dropdown">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>Reserve</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">3 Day Rental</a>
                <a class="dropdown-item" href="#">5 Day Rental</a>
                <a class="dropdown-item" href="#">7 Day Rental</a>
                </div>
                </div>
                <?php } ?>
                <?php if($row['inStock']=='1'){?>
                <small class="text" style="color:green;">In Stock</small>
                <?php }
                else { ?>
                 <small class="text" style="color:red;">No Stock</small>
                 <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php }
        }
        else {
            echo "No results found.";
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