<?php include "db-api.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <title>Document</title>
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
        <a class="nav-link px-3" href="index.html">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="dashboard.html">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="game-Details.html">
                <span data-feather="file" class="align-text-bottom"></span>
                Game Details

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tourMan.html">
                <span data-feather="info" class="align-text-bottom"></span>
                Tournament Mangement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="teamMan.html">
                <span data-feather="users" class="align-text-bottom"></span>
                Players & Teams
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Dashstatistics.html">
                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                Stats
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="upload.html">
                <span data-feather="upload" class="align-text-bottom"></span>
                Upload Media
              </a>
            </li>
          </ul>

          <p class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <!-- <span>Record Games</span> -->
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span>Record Games</span>
              <!-- <span data-feather="plus-circle" class="align-text-bottom"></span> -->
            </a>
          <h6>
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
      <main>

        <!-- section for tournaments cards -->
        <section id="tournament-cards" style="padding-left: 18%; padding-top: 5px;">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeam">
            <i class="fa fa-plus"></i> Add Team
          </button>

          <!-- Modal -->
          <div class="modal fade" id="addTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add tournament information bellow</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="register-team.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Coach</label>
                      <input type="text" name="coach" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Captain</label>
                      <input type="text" name="captain" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">origin</label>
                      <input type="text" name="origin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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

          <!-- for adding coach -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCoach">
            <i class="fa fa-plus"></i> Add Coach
          </button>

          <!-- Modal -->
          <div class="modal fade" id="addCoach" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add tournament information bellow</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="register-coach.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Team Name</label>
                      <input type="text" name="teamName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gender</label>
                      <input type="text" name="gender" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Position</label>
                      <input type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Experience, date started</label>
                      <input type="date" name="expreience" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Start of contract with the team</label>
                      <input type="date" name="sDate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">End of contract with the team</label>
                      <input type="date" name="eDate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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



          <!-- displaying the teams and their coaches -->

          <?php
          $names = array("Mike Sullivan", "Bob Boughner", "Rod Brind'Amour", "Derek King", "Jared Bednar", "Jeff Blashill", "Todd McLellan");
          $teams = $db->getTeams();
          while ($row = $teams->fetch_assoc()) {
            $coach = $db->getCoach($row["Coach_id"]);
            $players = $db->getTeamPlayers($row["Team_name"]);
            $coach = $coach->fetch_assoc();
            $num = rand(0, 6);
            echo '
              <div class="row" style="width: 60%; margin-left: auto; margin-right:auto; margin-bottom: 5px; background-color: #999;">
            <div style="backround-color: `grey`;" class="col-md-6">
              <h5>Team Information</h5>
              <hr>
              <h6>Name: ' . $row["Team_name"] . '<h6>
              <h6>Captain: ' . $row["Team_Captain"] . '<h6>
              <h6>Origin: ' . $row["Team_Origin"] . '<h6>
              <hr>
              <h6>Coach information</h6>
              <hr>
              <h6>Name: ' . $names[$num] . '<h6>
              <h6>Gender: ' . $coach["Gender"] . '<h6>
              <h6>Position: ' . $coach["Position"] . '<h6>
              <h6>Experience: ' . $coach["Experience"] . '<h6>
              <h6>Started: ' . $coach["Starting_Date"] . '<h6>
              <h6>Ending: ' . $coach["Ending_Date"] . '<h6>
              
            </div>
            ';
            while ($player = $players->fetch_assoc()) {
              echo '
              <div class="col-md-6">
              <h5>Players</h5>
              <hr>
              <h6><a href="#">'.$player["First_Name"]." ".$player["Last_Name"].'</a></h6>

              </div>
              <hr>
              <button style="width: 50%;color: blue" id="'.$player["Team_name"].'" class="btn btn-default updateTeam">Update Team</button>
              <button style="width: 50%;color: blue" id="'.$coach["Coaches_id"].'" class="btn btn-default updateCoach">Update Coach</button>
              <hr>
              </div>
              ';
            }
          }

          ?>

        </section>

      </main>
      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
      <!-- <script src="dashboard.js"></script> -->
      <script>
        var coachebuttons = document.getElementsByClassName('updateCoach');
        var teamButton = document.getElementsByClassName('updateTeam');
        var updateButton = document.getElementById("updateButton");
        var updateForm = document.getElementById("update-form");
        for (var i = 0; i < coachebuttons.length; i++) {
          coachebuttons[i].addEventListener("click", function() {
            alert("updating tournament: " + this.id);
            updateForm.innerHTML = '<div class="form-group">'+
                   ' <label for="exampleInputEmail1">ID</label>'+
                    '<input type="text" name="id" class="form-control" id="u-id" aria-describedby="emailHelp" placeholder="Enter email">'+
                 ' </div> <div class="form-group"><label for="exampleInputEmail1">Gender</label><input type="text" name="gender" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><div class="form-group"><label for="exampleInputEmail1">Position</label><input type="text" name="position" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><div class="form-group"><label for="exampleInputEmail1">Experience, date started</label><input type="date" name="expreience" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><div class="form-group"><label for="exampleInputEmail1">Start of contract with the team</label><input type="date" name="sDate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><div class="form-group"><label for="exampleInputEmail1">End of contract with the team</label><input type="date" name="eDate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><br><button type="submit" class="btn btn-primary">Confirm</button>';
            document.getElementById("u-id").value = this.id;
            updateForm.action = "coach-update.php";
            updateButton.click();
          })
          teamButton[i].addEventListener("click", function() {
            alert("updating tournament: " + this.id);
            updateForm.innerHTML = '<div class="form-group">'+
                   ' <label for="exampleInputEmail1">ID</label>'+
                    '<input type="text" name="id" class="form-control" id="u-id" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '<div class="form-group"><label for="exampleInputEmail1">Coach</label><input type="text" name="coach" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><div class="form-group"><label for="exampleInputEmail1">Captain</label><input type="text" name="captain" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><div class="form-group"><label for="exampleInputEmail1">origin</label><input type="text" name="origin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                    '</div><br><button type="submit" class="btn btn-primary">Confirm</button>';
            document.getElementById("u-id").value = this.id;
            updateForm.action = "team-update.php";
            
            updateButton.click();
          })
        }
      </script>
</body>

</html>