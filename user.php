<?php
// this page is what a normal will see 
session_start();
include "db-api.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
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


    <title>GUM field hockey--login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark ">
            <!-- navbar-dark bg-dark -->
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="imgs/logo.jpeg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    GUM Field Hockey (<?php
                                        $userRow = $db->retrieveUser($_SESSION["email"]);
                                        $userRow = $userRow->fetch_assoc();
                                        echo $userRow["First_Name"] . " " . $userRow["Last_Name"];
                                        ?>)
                </a></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li><a href="logout.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="login-form">
        <h3>Welcome to GUM Field Hockey, here you can add any information like coach, players, teams etc</h3>
        <hr>
        <div style="width: 60%; margin-left:auto; margin-right: auto;">
            <button class="btn" onClick=""><i class="fa fa-trophy"></i> Tournaments</button>
            <button class="btn" onClick="getTeams()"><i class="fa fa-icon-group"></i> Teams</button>
            <button class="btn" onClick="getPlayers()"><i class="fa fa-user" aria-hidden="true"></i> Players</button>
            <button class="btn" onClick="getStats()"><i class="fa fa-file-text"></i> Stats</button>
            <button class="btn" onClick="getEvents()"><i class="fa fa-calender-event"></i> Events</button>
            <button class="btn" onClick="upcoming()"><i class="fa fa-clipboard-data"></i> Up coming</button>

            <?php 
                $t = $db->getTournaments();
                echo "<script>console.log(t)</script>"
            ?>
        </div>
        <hr>

        <div class="items" id="items" >
            
        </div> <!-- end of users div -->
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // when the delete button is clicked the user must be deleted
        var items = document.getElementById("items");
        function getTournaments(){
           
        }
    </script>
</body>

</html>