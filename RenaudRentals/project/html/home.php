<html>
  <head>
    <?php include 'head.php'; ?>
    <link href="../css/album.css" rel="stylesheet">
  </head>
  <body>
    <?php $page = 'home'; include 'navbar.php'; ?>
<main>
 <section class="jumbotron text-center">
    <div class="container">
    <br>
      <h1>Welcome to RenaudRentals!</h1>
      <p class="lead text-muted">We let you rent games, old and new! Sign in and choose the game of your liking to reserve for 3, 5, or 7 days.</p>
      <img src="../pics/small-icon.png" class="card-img-top" style="width:325px;height:125px;" alt="..."></a>
      <br>
      <br>
      <strong>
      <ul class="list-group list-group-horizontal">
          <li class="list-group-item flex-fill" style="background-color:#45aaf2">3 Days at $4.99</li>
          <li class="list-group-item flex-fill" style="background-color:#4b7bec">5 Days at $7.99</li>
          <li class="list-group-item flex-fill" style="background-color:#3867d6">7 Days at $11.99</li>
        </ul></strong>
    </div>
  </section>
  <section class="jumbotron text-center">
    <div class="container">
      <h1>New Arrivals for Rent</h1>
      <p class="lead text-muted">The newest games ready for you to rent!</p>
      <br>
    </div>
  <div class="album py-5" style="background-color:#f1f2f6">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm"> 
            <a href="games.php?console=PS4">
            <img src="../pics/lastofus.jpg" class="img-fluid" alt="..."></a>
            <div class="card-body">
              <p class="card-text">The Last of Us: Part II</p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="games.php?console=PS4">
            <img src="../pics/ghost.jpg" class="img-fluid" alt="..."></a>
            <div class="card-body">
              <p class="card-text">Ghost of Tsushima</p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="games.php?console=Nintendo Switch">
            <img src="../pics/paperm.jpg" class="img-fluid" alt="..."></a>
            <div class="card-body">
              <p class="card-text">Paper Mario: The Origami King</p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm"> <a href="games.php?console=PS4">
              <img src="../pics/re3ps4.jpg" class="img-fluid" alt="..."> </a>
            <div class="card-body">
              <p class="card-text">Resident Evil 3</p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="games.php?console=PS4">
            <img src="../pics/ff7.jpg" class="img-fluid" alt="..."></a>
            <div class="card-body">
              <p class="card-text">Final Fantasy 7 Remake</p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="games.php?console=Xbox One">
            <img src="../pics/doom.jpg" class="img-fluid" alt="..."></a>
            <div class="card-body">
              <p class="card-text">Doom Eternal</p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
 <?php include 'footer.php'; ?>
</body>
</html>