<?php
     include "db-api.php";

     // getting the information from the post request
     $id = $_POST["id"];
     $name = $_POST["name"];
     $coach_id = $_POST["coach"];
     $captain = $_POST["captain"];
     $origin = $_POST["origin"];

     $team = $db->getTeam($id);
     $team = $team->fetch_assoc();

     if($name == ""){
         $name = $team["Team_name"];
     }
     if($coach_id == ""){
        $coach_id = $team["Coach_id"];
    }
    if($captain == ""){
        $captain = $team["Team_Captain"];
    }
    if($origin == ""){
        $origin = $team["Team_Origin"];
    }

     $db->teamUpdate($id, $name, $coach_id,$captain, $origin);
?>