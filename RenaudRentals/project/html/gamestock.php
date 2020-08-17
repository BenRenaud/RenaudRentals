<?php
require('db.php');
 if (isset($_GET['inStock'])) {
    if($_GET['inStock'] == '0'){
    $gameName = mysqli_real_escape_string($connect, $_GET['gameName']);
    $sql = "UPDATE game SET inStock='1' WHERE gameName='$gameName'";
    $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
    header('Location: gamestock.php');
    }
    else{
    $gameName = mysqli_real_escape_string($connect, $_GET['gameName']);
    $sql = "UPDATE game SET inStock='0' WHERE gameName='$gameName'";
    $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
    header('Location: gamestock.php');
    }
}
?>

<html lang="en">
  <head>
    <?php $page = 'login'; include 'head.php'; ?>
    <link href="../css/album.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'navbar.php'; ?>
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
        <br>
      <h1>Game Stock Database</h1>
      <p class="lead text-muted">Alter game availability for customers.</p>
        <p class="link"><a href="adminaccount.php">Go back to Admin Account page</a></p>
      <br>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php
        $sql = "SELECT * FROM game";
        $result= mysqli_query($connect, $sql) or die("Bad Query: $sql");
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
                <a type="button" class="btn btn-primary" name="changeStock" href="gamestock.php?inStock=<?php echo $row['inStock']?>&gameName=<?php echo $row['gameName']?>">Alter stock</a>
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