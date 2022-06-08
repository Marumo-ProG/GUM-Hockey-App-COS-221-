<?php
include "db-api.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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

  <link href="recEventStyle.css" rel="stylesheet">
  <script src="recEvent.js"></script>
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
              <a class="nav-link" aria-current="page" href="dashboard.php">
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

            <a class="link-secondary active" href="createRecord.php" aria-label="Add a new report">
              <!-- <i class="fa-solid fa-plus"></i> -->
              <span><strong>Record Games</strong></span>
            </a>
          </h6>
          
        </div>
      </nav>


      <main>
        <h1>Record Events</h1>
        <!-- <ul class="tabs">
	<li class="tab tabSelected" data-target="#FoulForm">Foul<a class="closeTab" href="">✕</a></li>
		<li class="tab selected"><a href="goalForm.php">Goal</a><a class="closeTab" href="">✕</a></li>
		<li class="tab selected"><a href="subForm.php">Substitution</a><a class="closeTab" href="">✕</a></li>
		<li class="tab selected"><a href="PSform.php">Penalty Stroke</a><a class="closeTab" href="">✕</a></li>
	    <li class="tab selected"><a href="GMform.php"></a>Game winner<a class="closeTab" href="">✕</a></li>
		<li class="tab selected"><a href="#">Some Thing 3</a><a class="closeTab" href="">✕</a></li>
		<li class="tab selected"><a href="#">Some Thing 4</a><a class="closeTab" href="">✕</a></li>
</ul>


<form id="FoulForm">
  <div class="form-group row">
    <label for="inputCommiter" class="col-sm-2 col-form-label">Foul Committer</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Foul Committer">
    </div>
  </div>
  <div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Team</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input" placeholder="Foul Committer's Team">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Were Cards Given?</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
           No Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Green Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            Yellow Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
           Red Card
          </label>
      </div>
    </div>
    <br>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Did foul reult in injury?</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
         Yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form> -->


        <div class="w3-bar w3-black">
          <button class="w3-bar-item w3-button" onclick="openEvent('Foul')">Foul</button>
          <button class="w3-bar-item w3-button" onclick="openEvent('Sub')">Substitution</button>
          <button class="w3-bar-item w3-button" onclick="openEvent('Shot')">Shot</button>
          <button class="w3-bar-item w3-button" onclick="openEvent('Corner')">Corner</button>
        </div>

        <div id="Foul" class="w3-container event">
          <form id="FoulForm" action="./register-foul.php" method="POST">
            <div class="form-group row">
              <label for="gameID" class="col-sm-2 col-form-label">Choose game ID</label>
              <div class="col-sm-10">
                <select class="form-control" name="game" id="gameID">
                  <?php
                  $t = $db->getGames();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Games_id"] . '">' . $row["Games_id"] . "(" . $row["Team_1"] . " VS " . $row["Team_2"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="player" class="col-sm-2 col-form-label">Foul Committer</label>
              <div class="col-sm-10">
                <select class="form-control" name="player" id="player">
                  <?php
                  $t = $db->getPlayers();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Player_id"] . '">' . $row["First_Name"] . " " . $row["Last_Name"] . "(" . $row["Team_name"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="team" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-10">
                <select class="form-control" name="type" id="team">
                  <option value="Travelling">Travelling</option>
                  <option value="Obstruction">Obstruction</option>
                  <option value="Backstick">Backstick</option>
                  <option value="Highball">Highball</option>
                  <option value="Shoulder">Shoulder</option>
                  <option value="Advancing'">Advancing</option>
                  <option value="Interfence">Interfence</option>
                  <option value="Blocking">Blocking</option>
                  <option value="Rough Play">Rough Play</option>
                </select>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Were Cards Given?</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="card" id="gridRadios1" value="none" checked>
                    <label class="form-check-label" for="gridRadios1">
                      No Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="card" id="gridRadios2" value="green">
                    <label class="form-check-label" for="gridRadios2">
                      Green Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="card" id="gridRadios3" value="yellow">
                    <label class="form-check-label" for="gridRadios3">
                      Yellow Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="card" id="gridRadios2" value="red">
                    <label class="form-check-label" for="gridRadios2">
                      Red Card
                    </label>
                  </div>
                </div>
                <br>
            </fieldset>

            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>



        <div id="Sub" class="w3-container event" style="display:none">
          <form action="./register-sub.php" method="POST">
            <div class="form-group row">
              <label for="gameID" class="col-sm-2 col-form-label">Choose game ID</label>
              <div class="col-sm-10">
                <select class="form-control" name="game" id="gameID">
                  <?php
                  $t = $db->getGames();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Games_id"] . '">' . $row["Games_id"] . "(" . $row["Team_1"] . " VS " . $row["Team_2"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="player" class="col-sm-2 col-form-label">On Player</label>
              <div class="col-sm-10">
                <select class="form-control" name="onPlayer" id="player">
                  <?php
                  $t = $db->getPlayers();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Player_id"] . '">' . $row["First_Name"] . " " . $row["Last_Name"] . "(" . $row["Team_name"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="offPlayer" class="col-sm-2 col-form-label">Off Player</label>
              <div class="col-sm-10">
                <select class="form-control" name="offPlayer" id="offPlayer">
                  <?php
                  $t = $db->getPlayers();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Player_id"] . '">' . $row["First_Name"] . " " . $row["Last_Name"] . "(" . $row["Team_name"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>

            <br>
            <div class="form-group row">
              <label for="inputCommiter" class="col-sm-2 col-form-label">Postion</label>
              <div class="col-sm-10">
                <input type="text" name="position" class="form-control" id="inputPR" placeholder="Position of Player Being replaced">
              </div>
              <br>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>

        <div id="Shot" class="w3-container event" style="display:none">
          <form action="./register-shot.php" method="POST">
            <div class="form-group row">
              <label for="gameID" class="col-sm-2 col-form-label">Choose game ID</label>
              <div class="col-sm-10">
                <select class="form-control" name="game" id="gameID">
                  <?php
                  $t = $db->getGames();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Games_id"] . '">' . $row["Games_id"] . "(" . $row["Team_1"] . " VS " . $row["Team_2"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="offPlayer" class="col-sm-2 col-form-label">Shot Taker</label>
              <div class="col-sm-10">
                <select class="form-control" name="player" id="offPlayer">
                  <?php
                  $t = $db->getPlayers();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Player_id"] . '">' . $row["First_Name"] . " " . $row["Last_Name"] . "(" . $row["Team_name"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>

            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Type of shot</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="Penality" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Penalty Stroke
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="gridRadios3" value="Field Goal">
                    <label class="form-check-label" for="gridRadios3">
                      Field Goal
                    </label>
                  </div>

                </div>
              </div>
              <br>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-2">Was the short assisted?</div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input name="assisted" class="form-check-input" value="True"  type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Yes
                  </label>
                </div>
              </div><div class="col-sm-2">Was the short saved?</div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input name="saved" value="True" class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Yes
                  </label>
                </div>
              </div>
              <div class="col-sm-2">Was the short intercepted?</div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input name="intercept" value="True" class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Yes
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>

        <!-- <div id="GM" class="w3-container event" style="display:none">
<form id="FoulForm">
  <div class="form-group row">
    <label for="inputCommiter" class="col-sm-2 col-form-label">Foul Committer</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Foul Committer">
    </div>
  </div>
  <div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Team</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input" placeholder="Foul Committer's Team">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Were Cards Given?</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
           No Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Green Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            Yellow Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
           Red Card
          </label>
      </div>
    </div>
    <br>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Did foul reult in injury?</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
         Yes
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div> -->


        <div id="Corner" class="w3-container event" style="display:none">
          <form action="./register-hits.php" method="POST">
          <div class="form-group row">
              <label for="gameID" class="col-sm-2 col-form-label">Choose game ID</label>
              <div class="col-sm-10">
                <select class="form-control" name="game" id="gameID">
                  <?php
                  $t = $db->getGames();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Games_id"] . '">' . $row["Games_id"] . "(" . $row["Team_1"] . " VS " . $row["Team_2"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="offPlayer" class="col-sm-2 col-form-label">Player taking the hit</label>
              <div class="col-sm-10">
                <select class="form-control" name="player" id="offPlayer">
                  <?php
                  $t = $db->getPlayers();
                  while ($row = $t->fetch_assoc()) {
                    echo '
                          <option value="' . $row["Player_id"] . '">' . $row["First_Name"] . " " . $row["Last_Name"] . "(" . $row["Team_name"] . ")" . '</option>
                        ';
                  }
                  ?>
                </select>
              </div>
            </div>
           
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Type of Corner</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="16 yard hit" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Long Corner
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="gridRadios3" value="Free hit">
                    <label class="form-check-label" for="gridRadios3">
                      Short Corner
                    </label>
                  </div>
                </div>
              </div>
              <br>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-2">Intercepted?</div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input name="intercepted" class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Yes
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>

      </main>

      <script src="recEvent.js"></script>
</body>

</html>