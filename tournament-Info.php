<?php include "db-api.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     <link rel="stylesheet" href="tournamentCSS.css">
     <script type="text/javascript" src="tournaments.js"></script>
     <title>Upcoming Tournaments</title>
</head>
<body>
     <header> <nav class="navbar navbar-expand-lg fixed-top navbar navbar-expand-lg fixed-top navbar-dark bg-dark navbar-scroll">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="imgs/logo.jpeg" alt="" width="30" height="24" class="d-inline-block align-text-top"> Upcoming Tournaments</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Overview</a> <!--should this be index.php-->
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="tournament-Info.php">Tournaments & Upcoming Matches</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stats.php">Stats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Dashboard</a>
      </ul>
    </div>
  </div>
</nav></header>

<br><br><br>
<form>
  <label for="upcoming">Display:</label>
  <select name="upcoming" id="upcoming" onchange="DiffTable()">
    <option value="Tournaments">Tournaments</option>
    <option value="Games">Games</option>
  </select>
</form>
<br>
<div class="table-container">
<table class="Tournaments" id="Tournaments">
  <tr>
    <th style="text-align: center">Tournament</th>
    <th style="text-align: center">Season</th>
    <th style="text-align: center">City</th>
    <th style="text-align: center">Country</th>
    <th style="text-align: center">Winner</th>
  </tr>
  <?php 
          $playerStats = $db->getTournaments();
          $c = 0;

          while($c < count($playerStats)){
           $row = $playerStats[$c];
            echo '<tr><td>'.$row["Tournement_Name"].'</td>
            <td>'.$row["Tournement_Season"].'</td>
            <td>'.$row["Game_loser"].'</td>
            <td>'.$row["Tournement_Location_City"].'</td>
            <td>'.$row["Tournement_Location_Country"].'</td>
            <td>'.$row["Tournement_Winner"].'</td>
            </tr>';
            $c++;
          }
        ?>
</table>
<table class="Games" id="Games">
  <tr>
    <th style="text-align: center">Tournament</th>
    <th style="text-align: center">Game Round</th>
    <
    <th style="text-align: center">Team 1</th>
    <th style="text-align: center">Team 2</th>
    <th style="text-align: center">Date of Match</th>
    <th style="text-align: center">Alternate Date</th>
    
  </tr>
  <?php 
          $playerStats = $db->getGames();

          while($row = $playerStats->fetch_assoc()){
           $tname = $db->getTournament($row["Tournement_ID"]);
           $tname = $tname->fetch_assoc();
            echo '<tr><td>'.$tname["Tournement_Name"].'</td>
            <td>'.$row["Game_round"].'</td>
            <td>'.$row["Team_1"].'</td>
            <td>'.$row["Team_2"].'</td>
            <td>'.$row["Date_of_Match"].'</td>
            <td>'.$row["Alt_match_day"].'</td>
            <td>'.$row["Time_duration"].'</td>
            
            </tr>';
          }
        ?>
</table>
</div>
<br>

 <footer class="bg-light text-center text-lg-start">

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">"GUM Tournaments"</a>
  </div>
  <!-- Copyright -->
</footer>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>