<?php
    include "db-api.php";
    
    // getting the coach data thrpugh post
    $team = $_POST["teamName"];
    $gender = $_POST["gender"];
    $position = $_POST["position"];
    $experience = $_POST["experience"];
    $sDate = $_POST["startingDate"];
    $eDate = $_POST["endingDate"];

    $db->registerCoach($team, $gender, $position, $experience, $sDate, $eDate);
?>