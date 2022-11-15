<?php
    include "db-api.php";

    // getting the data
    
    // player ID will have to generated
    
    $team = $_POST['team'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $position = $_POST['position'];
    $dob = $_POST['dob'];
    $player_id = $first_name[0].$last_name[0].rand(100,999);

    $db->registerPlayer($player_id, $team, $first_name, $last_name, $position,$dob);

?>