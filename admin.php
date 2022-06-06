<?php session_start();
include "db-api.php"; ?>
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
    <h3>Welcome to User administration!</h3>
    <hr>

    <button style="float: right" class="btn" onClick="window.location.href = './signin.php'"><i class="fa fa-plus"></i> Add user</button>

    <div class="users" id="accordionExample">
      <?php
      // getting users and printing them here
      $users = $db->retrieveUsers();
      $users = json_decode($users, true);

      for ($i = 0; $i < count($users); $i++) {
        echo "<div class='card'><div class='card-header' id='" . $users[$i]["user_id"] . "'><h5><button class='btn btn-link' type='button' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>" .
          $users[$i]["First_Name"] . " " . $users[$i]["Last_Name"] . "(#" . $users[$i]["user_id"] . ")" . "</button></h5></div><div class='collapse show' aria-labelledby='headingOne' data-parent='#accordionExample'><div class='card-body'>" .
          "<h6>First Name: " . $users[$i]["First_Name"] . "</h6><h6>Last Name: " . $users[$i]["Last_Name"] . "</h6><h6>Email: " . $users[$i]["Email"] . "</h6><h6>Is_admin? " . $users[$i]["is_admin"] . "</h6><button id='" . $users[$i]["Email"] . "' style='background-color: red; color: black;' class='btn remove'><i class='fa fa-trash'></i> Remove user</button></div></div</div>";
      }
      ?>

    </div> <!-- end of users div -->
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // when the delete button is clicked the user must be deleted
    var r = document.getElementsByClassName("remove");
    for (var i = 0; i < r.length; i++) {
      r[i].addEventListener("click", function() {
        alert("user id: " + this.id + " about to be deleted");
        
        var form = document.createElement('form');
        form.action = "./remove-user.php";
        form.method = "POST";
        var id = document.createElement('input');
        id.type="text";
        id.name = "email";
        id.value = this.id;
        form.appendChild(id);
        document.body.appendChild(form);
        form.submit();
      })
    }
  </script>
</body>

</html>