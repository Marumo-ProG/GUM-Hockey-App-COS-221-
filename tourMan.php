<?php
session_start();
if (!isset($_SESSION['email'])) {
  echo "<script>alert('You are not Logged in, Please login'); window.location.href = './login.php'</script>";
}
include "db-api.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mange tournament</title>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="dashStyles.css" rel="stylesheet">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">GUM Tournaments</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> -->
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="index.php">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">
                <i class="fa-solid fa-house"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="game-Details.php">
                <span data-feather="file" class="align-text-bottom"></span>
                Game Details

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tourMan.php">
                <span data-feather="info" class="align-text-bottom"></span>
                Tournament Mangement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teamMan.php">
                <span data-feather="users" class="align-text-bottom"></span>
                Players & Teams
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Dashstatistics.php">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Stats
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="upload.php">
                <span data-feather="upload" class="align-text-bottom"></span>
                Upload Media
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">

            <a class="link-secondary" href="#" aria-label="Add a new report">
              <!-- <i class="fa-solid fa-plus"></i> -->
              <span>Record Games</span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Last quarter
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- section for tournaments cards -->
      <section id="tournament-cards" style="padding-left: 18%; padding-top: 5px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa fa-plus"></i> Add Tournament
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add tournament information bellow</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="register-tournament.php" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Season</label>
                    <input type="text" name="season" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>

        <!-- the update section -->
        <button type="button" style="display: none;" id="updateButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update">
          <i class="fa fa-plus"></i> Add Tournament
        </button>

        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update tournament information bellow</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="tournament-update.php" id="update-form" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" name="id" class="form-control" id="u-id" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="u-name" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Season</label>
                    <input type="text" name="season" class="form-control" id="u-season" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text" name="country" class="form-control" id="u-country" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" name="city" class="form-control" id="u-city" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Winner</label>
                    <input type="text" name="winner" class="form-control" id="u-winner" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>
        <!-- end of update -->
        <div class="row">
          <?php
          // searching the tournaments data from the database
          $tournaments = $db->getTournaments();
          for ($i = 0; $i < count($tournaments); $i++) {
            $winner;
            if ($tournaments[$i]["Tournement_Winner"] == null) {
              $winner = "Not Set!";
            } else
              $winner = $tournaments[$i]["Tournement_Winner"];
            echo '
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">' . $tournaments[$i]["Tournement_Name"] . '</h5>
                <p class="card-text">Season: ' . $tournaments[$i]["Tournement_Season"] . '</p>
                <p class="card-text">Winner: ' . $winner . '</p>
                <p class="card-text">Location: ' . $tournaments[$i]["Tournement_Location_City"] . ', ' . $tournaments[$i]["Tournement_Location_Country"] . '</p>
                <a href="#" id="' . $tournaments[$i]["Tournement_ID"] . '" class="btn btn-primary update">Update information</a>
              </div>
            </div>
          </div>
        ';
          }
          ?>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
      <script>
        var u = document.getElementsByClassName('update');
        var xhttp = new XMLHttpRequest();
        var updateButton = document.getElementById("updateButton");
        var updateForm = document.getElementById("update-form");
        for (var i = 0; i < u.length; i++) {
          u[i].addEventListener("click", function() {
            alert("updating tournament: " + this.id);
            document.getElementById("u-id").value = this.id;
            
            updateButton.click();
          })
        }
      </script>
</body>

</html>