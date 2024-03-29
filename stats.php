<?php include "db-api.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="statsStyles.css">
  <script type="text/javascript" src="stats.js"></script>
  <title>Statistics</title>
</head>

<header>
  <nav class="navbar navbar-expand-lg fixed-top navbar navbar-expand-lg fixed-top navbar-dark bg-dark navbar-scroll">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="imgs/logo.jpeg" alt="" width="30" height="24" class="d-inline-block align-text-top"> Statistics</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Overview</a>
            <!--should this be index.php-->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tournament-Info.php">Tournaments & Upcoming Matches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="stats.php">Stats</a>
          </li>
          <li class="nav-item">
            <a href="./signin.php" class="nav-link">Signup</a>
          </li>
          <li class="nav-item">
            <a href="./login.php" class="nav-link">Login</a>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>

  <br><br><br>
  
  <br>
  <hr>
  <h3>Player Statistics </h3>
  <table class="PlayerStats" id="PlayerStats" style="visibility: visible; margin-bottom: 5px;">
    <tr>
      <th style="text-align: center">Player</th>
      <th style="text-align: center">Rating</th>
      <th style="text-align: center">Total Goals</th>
      <th style="text-align: center">Total Assists</th>
      <th style="text-align: center">Nr Red Cards</th>
      <th style="text-align: center">Nr Yellow Cards</th>
      <th style="text-align: center">Nr Green Cards</th>
    </tr>

    <?php
    $playerStats = $db->getAllPlayerStats();

    while ($row = $playerStats->fetch_assoc()) {
      $player = $db->getPlayer($row["Player_id"]);
      $player = $player->fetch_assoc();
      echo '<tr><td>' . $player["First_Name"][0] . " " . $player["Last_Name"] . '</td>
            <td>' . $row["Player_rating"] . '</td>
            <td>' . $row["Total_goals"] . '</td>
            <td>' . $row["Total_assists"] . '</td>
            <td>' . $row["Red_cards"] . '</td>
            <td>' . $row["Yellow_cards"] . '</td>
            <td>' . $row["Green_cards"] . '</td>
            </tr>';
    }
    ?>

  </table>
  <hr>
  <h3>Game Statistics </h3>
  <table class="GameStats" id="GameStats" style="visibility: visible;margin-bottom: 5px;">
    <tr>
      <th style="text-align: center">Game</th>
      <th style="text-align: center">Winner</th>
      <th style="text-align: center">Loser</th>
      <th style="text-align: center">Nr Short Corners</th>
      <th style="text-align: center">Nr Long Corners</th>
      <th style="text-align: center">Penalties</th>
      <th style="text-align: center">Own Goals</th>
      <th style="text-align: center">Free Hits</th>
      <th style="text-align: center">Total Fouls</th>
      <th style="text-align: center">Nr Red Cards</th>
      <th style="text-align: center">Nr Yellow Cards</th>
      <th style="text-align: center">Nr Green Cards</th>
      <th style="text-align: center">Total Games</th> <!-- what ?-->
      <th style="text-align: center">Extra Time</th>
    </tr>
    <?php
    $playerStats = $db->getAllGameStats();

    while ($row = $playerStats->fetch_assoc()) {

      echo '<tr><td>' . $row["Game_id"] . '</td>
            <td>' . $row["Game_winner"] . '</td>
            <td>' . $row["Game_loser"] . '</td>
            <td>' . $row["Short_corners"] . '</td>
            <td>' . $row["Red_cards"] . '</td>
            <td>' . $row["Long_corners"] . '</td>
            <td>' . $row["Penalties"] . '</td>
            <td>' . $row["Own_goals"] . '</td>
            <td>' . $row["Free_hits"] . '</td>
            <td>' . $row["Total_fouls"] . '</td>
            <td>' . $row["Red_cards"] . '</td>
            <td>' . $row["Yellow_cards"] . '</td>
            <td>' . $row["Green_cards"] . '</td>
            <td>' . $row["Extra_time"] . '</td>
            </tr>';
    }
    ?>
  </table>
  <hr>
  <h3>Team Statistics </h3>
  <table class="TeamStats" id="TeamStats" style="visibility: visible; margin-bottom: 5px;">
    <tr>
      <th style="text-align: center">Team name</th>
      <th style="text-align: center">Rating</th>
      <th style="text-align: center">Wins</th>
      <th style="text-align: center">Losses</th>
      <th style="text-align: center">Draws</th>
      <th style="text-align: center">Games Played</th>
      <th style="text-align: center">Cards Issued</th>
      <th style="text-align: center">Goals Conceded</th>
      <th style="text-align: center">Shots on Goal</th>
      <th style="text-align: center">Shots on target</th>
      <th style="text-align: center">Goal Accuracy</th>
      <th style="text-align: center">Losses</th>
    </tr>
    <?php
    $playerStats = $db->getTeamStats();

    while ($row = $playerStats->fetch_assoc()) {

      echo '<tr><td>' . $row["Team_Name"] . '</td>
            <td>' . $row["Team_rating"] . '</td>
            <td>' . $row["Team_wins"] . '</td>
            <td>' . $row["Team_loses"] . '</td>
            <td>' . $row["Team_draws"] . '</td>
            <td>' . $row["Games_played"] . '</td>
            <td>' . $row["Cards_issued"] . '</td>
            <td>' . $row["Goals_conceded"] . '</td>
            <td>' . $row["Shots_on_goal"] . '</td>
            <td>' . $row["Shots_on_target"] . '</td>
            <td>' . $row["Goal_accuracy"] . '</td>
            <td>' . $row["Team_loses"] . '</td>
            </tr>';
    }
    ?>
  </table>
</body>
<br><br><br>

<footer class="bg-light text-center text-lg-start">

  <!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Overview</a></li>
    <li class="breadcrumb-item active" aria-current="page">Stats</li>
  </ol>-->


  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">"GUM Tournaments"</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</html>