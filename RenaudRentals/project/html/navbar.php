<?php session_start(); ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #30336b;">
  <a class="navbar-brand" href="home.php"><img src="../pics/small-icon.png" width="175" height="65" class="d-inline-block align-top" alt="" loading="lazy"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?php if($page=='home'){echo 'active';}?>" href="home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($page=='games'){echo 'active';}?>" href="games.php?console=All">Games</a>
      </li>
      <li class="nav-item">
          <?php if(empty($_SESSION['email'])){ ?>
      <a class="nav-link <?php if($page=='login'){echo 'active';}?>" href="login.php">Log-in / Register</a>
          <?php }
          else { ?>
          <li class="nav-item dropdown">
        <a class="nav-link <?php if($page=='login'){echo 'active';}?> dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['email']; ?></a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <?php if(empty($_SESSION['employeeID'])){ ?>
          <a class="dropdown-item" href="account.php">User Account</a>
          <?php } else { ?>
          <a class="dropdown-item" href="adminaccount.php">Admin Account</a>
          <?php } ?>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
      <?php } ?>
        </li>
    </ul>
  </div>
</nav>