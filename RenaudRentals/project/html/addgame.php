<?php
require('db.php');
if (isset($_REQUEST['gameName'])) {
    $gameName = stripslashes($_REQUEST['gameName']);
    $gameName = mysqli_real_escape_string($connect, $gameName);
    $image = stripslashes($_REQUEST['image']);
    $image = mysqli_real_escape_string($connect, $image);
    $console  = stripslashes($_REQUEST['console']);
    $console  = mysqli_real_escape_string($connect, $console);
    $year = stripslashes($_REQUEST['year']);
    $year = mysqli_real_escape_string($connect, $year);
    $players = stripslashes($_REQUEST['players']);
    $players = mysqli_real_escape_string($connect, $players);
    $genre = stripslashes($_REQUEST['genre']);
    $genre = mysqli_real_escape_string($connect, $genre);
    $query    = "INSERT into `game` (gameName, image, console, year, players, genre) VALUES ('$gameName', '$image', '$console', '$year', '$players', '$genre')";
    $result   = mysqli_query($connect, $query);

    if ($result) {
        echo "<div class='form' style='width:800px; margin:0 auto;'>
            <h3>You have added a game successfully.</h3><br/>
            <p class='link'>Click here to add another <a href='addgame.php'>game.</a></p></div>";
        } else {
        echo "<div class='form'>
            <h3>Something went wrong with adding the game.</h3><br/>
            <p class='link' style='width:800px; margin:0 auto;'>Click here to <a href='addgame.php'>try again.</p></div>";
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
     <form class="form-signin border rounded-lg" name="addGame" id="addGame" method="post">
        <h1 class="h3 mb-3 font-weight-normal login-title">Register a new game:</h1>
        <label for="gameName" class="sr-only">Game Name</label>
        <input type="text" class="login-input form-control" name="gameName" placeholder="Game Name" autofocus="true" required/>
        <label for="image" class="sr-only">Game Image</label>
        <input type="file" class="login-input form-control" name="image" placeholder="Game Image" autofocus="true" required/>
        <label for="console" class="sr-only">Console</label>
        <input type="text" class="login-input form-control" name="console" placeholder="Game Console" autofocus="true" required/>
        <label for="year" class="sr-only">Year</label>
        <input type="text" class="login-input form-control" name="year" placeholder="Year" autofocus="true" required/>
        <label for="players" class="sr-only">Players</label>
        <input type="text" class="login-input form-control" name="players" placeholder="Players" autofocus="true" required/>
        <label for="genre" class="sr-only">Genre</label>
        <input type="text" class="login-input form-control" name="genre" placeholder="Genre" autofocus="true" required/>
        <input type="submit" value="Register" name="submit" id="submit" class="btn btn-lg btn-primary btn-block login-button"/>
        <br>
        <p class="link"><a href="adminaccount.php">Go back to Admin account page</a></p>
    </form>
  </div>
</body>
</html>