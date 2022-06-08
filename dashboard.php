<?php
session_start();
if (!isset($_SESSION['email'])) {
  echo "<script>alert('You are not Logged in, Please login'); window.location.href = './login.php'</script>";
}
include "db-api.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Dashboard</title>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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
          
        </div>
      </nav>
      <section id="tournament-cards" style="padding-left: 18%; padding-top: 5px;">
        <!-- for adding Game -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGame">
          <i class="fa fa-plus"></i> Add Game
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addGame" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add tournament information bellow</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="./register-Game.php" method="POST">
                  <div class="form-group">
                    <label for="cars">Choose an umpire</label>
                    <select class="form-control" name="umpire" id="cars">
                      <?php
                      $umpires = $db->getUmpires();
                      while ($row = $umpires->fetch_assoc()) {
                        echo '
                          <option value="' . $row["Umpire_licence"] . '">' . $row["Name"] . '</option>
                        ';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="cars">Choose Tournament ID</label>
                    <select class="form-control" name="tournamentID" id="cars">
                      <?php
                      $t = $db->getTournaments();
                      $c = 0;
                      while ($c < count($t)) {
                        $row = $t[$c];
                        echo '
                          <option value="' . $row["Tournement_ID"] . '">' . $row["Tournement_Name"] . '</option>
                        ';
                        $c++;
                      }
                      ?>
                    </select>

                  </div>
                  <div class="form-group">
                     <label for="team1">Choose The first Team</label>
                    <select class="form-control" name="team1" id="team1">
                      <?php
                      $t = $db->getTeams();
                      while ($row = $t->fetch_assoc()) {
                        
                        echo '
                          <option value="' . $row["Team_name"] . '">' . $row["Team_name"] . '</option>
                        ';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="team2">Choose the second Team</label>
                  <select class="form-control" name="team2" id="team2">
                      <?php
                      $t = $db->getTeams();
                      while ($row = $t->fetch_assoc()) {
                        
                        echo '
                          <option value="' . $row["Team_name"] . '">' . $row["Team_name"] . '</option>
                        ';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date of Match</label>
                    <input type="date" name="dMatch" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alternate Match date</label>
                    <input type="date" name="altMatch" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Time Duration</label>
                    <input type="number" name="duration" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Round</label>
                    <input type="number" name="round" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

        <!-- for adding an Umpire -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUmpire">
          <i class="fa fa-plus"></i> Add Umpire
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addUmpire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Umpire information bellow</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="./register-Umpire.php" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number of games already umpired for</label>
                    <input type="number" name="games" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Age</label>
                    <input type="number" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Experience, in years</label>
                    <input type="number" name="experience" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

        
      </section>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div> -->
        </div>

        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

        <h2>Ongoing Tournaments</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Team Name</th>
                <th scope="col">Rating</th>
                <th scope="col">Games Played</th>
                <th scope="col">GamesWon</th>
                <th scope="col">Games lost</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $gameStats = $db->getTeamStats();
              while ($gameStats->fetch_assoc()) {
                echo '<tr>
                <td>' . $gameStats["Team_Name"] . '</td>
                <td>' . $gameStats["Team_rating"] . '</td>
                <td>' . $gameStats["Games_played"] . '</td>
                <td>' . $gameStats["Team_wins"] . '</td>
                <td>' . $gameStats["Team_loses"] . '</td>
                
              </tr>';
              };
              ?>

              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>


  <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <!-- <script src="dashboard.js"></script> -->

  <script>
    function change() {
      if (document.getElementById('event').value == "foul") {
        document.getElementById("eventForm").innerHTML = '';
      } else if (document.getElementById('event').value == "sub") {

      }

    }
  </script>
</body>

</html>