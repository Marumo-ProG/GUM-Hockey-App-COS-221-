<?php include "db-api.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="icon" href="/Users/tlhalefodikolomela/Desktop/COS 216/COS216-Mock/imgs/faviconEarth.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">


  <title>Home</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark ">
      <!-- navbar-dark bg-dark -->
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="imgs/logo.jpeg" alt="" width="30" height="24" class="d-inline-block align-text-top">
          "GUM Tournaments"
        </a></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tournament-Info.php">Tournaments & Upcoming Matches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stats.php">Stats</a>
            </li>
            <li class="nav-item">
              <a href="./signin.php" class="nav-link">Signup</a>
            </li>
            <li class="nav-item">
              <a href="./login.php" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imgs/download.webp" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/hockeyimg3.webp" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="imgs/hockeyimg2.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>
  <div class="Tornament-Tracker">
    <h1>Overall Tournament Statistics</h1>
    <hr>
    <div class="container">
      <div class="row row-cols-2">
        <div class="col">
          <h2>Goals Scored</h2>
          <!-- <img src=" imgs/goal.webp" class="goal-img">
        <div class="goals-Detail">
          <h3>345</h3>
        </div> -->

          <div class="row">
            <div class="col Detail">
              <img src=" imgs/goal.webp" class="goal-img">
            </div>
            <?php
            $fouls = $db->getFouls();
            $red = 0;
            $green = 0;
            $yellow =0;
              while($row = $fouls -> fetch_assoc()){
                if($row["Card_issued"] == "Red"){
                  $red = $red+1;
                }else if($row["Card_issued"] == "Green"){
                  $green = $green+1;
                }else if($row["Card_issued"] == "Yellow"){
                  $yellow = $yellow+1;
                }
              }
            ?>
            <div class="col">
              <h3>345</h3>
            </div>
          </div>
        </div>
        <div class="col">
          <h2>Red Cards</h2>
          <div class="row">
            <div class="col Detail">
              <img src="imgs/redCard.png" class="goal-img">
            </div>
            <div class="col">
              <h3><?php echo $red; ?></h3>
            </div>
          </div>
        </div>
        <div class="col">
          <h2>Yellow cards</h2>
          <div class="row">
            <div class="col Detail">
              <img src="imgs/yellowCard.jpeg" class="goal-img">
            </div>
            <div class="col">
              <h3><?php echo $red; ?></h3>
            </div>
          </div>
        </div>
        <div class="col">
          <h2>Green cards</h2>
          <div class="row">
            <div class="col goals-Detail">
              <img src="imgs/greenCard.jpeg" class="goal-img">
            </div>
            <div class="col">
              <h3><?php echo $red; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  
  <br>
  <h1> Top Players</h1>
  <hr>
  <div class="container">

    <div class="box">
      <div class="imgBox">
        <img src="./imgs/Timm_Herzbruch.jpg" alt="">
      </div>
      <div class="content">
        <?php 
          $firstPlater = $db->getAllPlayerStats();
          $rows = $firstPlater;
          $firstPlater = $firstPlater->fetch_assoc();
          $player = $db->getPlayer($firstPlater["Player_id"]);
          if($player->num_rows > 0){
            $player = $player->fetch_assoc();

          echo '<h2>'.$player["First_Name"]." ".$player["Last_Name"].'</br>
          <span>'.$player["Position"].': '.$firstPlater["Total_goals"].' Goals, starting in '.$firstPlater['Total_assists'].' assists in '.$firstPlater["Games_played"].' Tornaments</span>
        </h2>';
          }
          
        ?>
        
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <img src="imgs/7f033b2b0bef37c90f527f587169f81b.jpg" alt="">
      </div>
      <div class="content">
      <?php 
          $firstPlater = $rows->fetch_assoc();
          $player = $db->getPlayer($firstPlater["Player_id"]);
          if($player->num_rows > 0){
            $player = $player->fetch_assoc();

          echo '<h2>'.$player["First_Name"]." ".$player["Last_Name"].'</br>
          <span>'.$player["Position"].': '.$firstPlater["Total_goals"].' Goals, starting in '.$firstPlater['Total_assists'].' assists in '.$firstPlater["Games_played"].' Tornaments</span>
        </h2>';
          }

        ?>
        
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <img src="imgs/1a1j5Yqu_400x400.jpg" alt="">
      </div>
      <div class="content">
      <?php 
          $firstPlater = $rows->fetch_assoc();
          $player = $db->getPlayer($firstPlater["Player_id"]);
          if($player->num_rows > 0){
            $player = $player->fetch_assoc();

          echo '<h2>'.$player["First_Name"]." ".$player["Last_Name"].'</br>
          <span>'.$player["Position"].': '.$firstPlater["Total_goals"].' Goals, starting in '.$firstPlater['Total_assists'].' assists in '.$firstPlater["Games_played"].' Tornaments</span>
        </h2>';
          }

        ?>
      </div>
    </div>

    
  </div>
  <br>
  <!-- Tab links -->
  <!--
  <div class="tables">
    <div class="tab">
      <button class="tablinks active" onclick="openTour(event, 'Tournament1')">Tournament1</button>
      <button class="tablinks" onclick="openTour(event, 'Tournament2')">Tournament2</button>
      <button class="tablinks" onclick="openTour(event, 'Tournament3')">Tournament3</button>
      <button class="tablinks" onclick="openTour(event, 'Tournament4')">Tournament4</button>
    </div>

   
    <div id="Tournament1" class="tabcontent">
      <div class="ptable">
        <table>
          <tr class="col">
            <th>#</th>
            <th>Team</th>
            <th>GP</th>
            <th>W</th>
            <th>D</th>
            <th>L</th>
            <th>GD</th>
            <th>PTS</th>
          </tr>
          <tr class="wpos">
            <td>1</td>
            <td>Warriors FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>5</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>2</td>
            <td>YOLO FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>4</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>3</td>
            <td>Majestic A</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>4</td>
            <td>4</td>
          </tr>
          <tr class="wpos">
            <td>4</td>
            <td>Fenris</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>1</td>
            <td>4</td>
          </tr>

        </table>
      </div>
    </div>

    <div id="Tournament2" class="tabcontent">
      <div class="ptable">
        <table>
          <tr class="col">
            <th>#</th>
            <th>Team</th>
            <th>GP</th>
            <th>W</th>
            <th>D</th>
            <th>L</th>
            <th>GD</th>
            <th>PTS</th>
          </tr>
          <tr class="wpos">
            <td>1</td>
            <td>Warriors FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>5</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>2</td>
            <td>YOLO FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>4</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>3</td>
            <td>Majestic A</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>4</td>
            <td>4</td>
          </tr>
          <tr class="wpos">
            <td>4</td>
            <td>Fenris</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>1</td>
            <td>4</td>
          </tr>

        </table>
      </div>
    </div>

    <div id="Tournament3" class="tabcontent">
      <div class="ptable">
        <table>
          <tr class="col">
            <th>#</th>
            <th>Team</th>
            <th>GP</th>
            <th>W</th>
            <th>D</th>
            <th>L</th>
            <th>GD</th>
            <th>PTS</th>
          </tr>
          <tr class="wpos">
            <td>1</td>
            <td>Warriors FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>5</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>2</td>
            <td>YOLO FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>4</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>3</td>
            <td>Majestic A</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>4</td>
            <td>4</td>
          </tr>
          <tr class="wpos">
            <td>4</td>
            <td>Fenris</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>1</td>
            <td>4</td>
          </tr>

        </table>
      </div>
    </div>
    <div id="Tournament4" class="tabcontent">
      <div class="ptable">
        <table>
          <tr class="col">
            <th>#</th>
            <th>Team</th>
            <th>GP</th>
            <th>W</th>
            <th>D</th>
            <th>L</th>
            <th>GD</th>
            <th>PTS</th>
          </tr>
          <tr class="wpos">
            <td>1</td>
            <td>Warriors FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>5</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>2</td>
            <td>YOLO FC</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>4</td>
            <td>6</td>
          </tr>
          <tr class="wpos">
            <td>3</td>
            <td>Majestic A</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>4</td>
            <td>4</td>
          </tr>
          <tr class="wpos">
            <td>4</td>
            <td>Fenris</td>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>0</td>
            <td>1</td>
            <td>4</td>
          </tr>

        </table>
      </div>
    </div>
  </div>
        -->

  <script>
    function openTour(evt, tourName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tourName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>

  <footer class="bg-light text-center text-lg-start">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Overview</li>
      </ol>
    </nav>


    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      <br>
      <a class="text-dark" href="login.php">Manage teams & Players</a>
      <br>
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">"GUM Tournaments"</a>
      <br>

    </div>
    <!-- Copyright -->
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>