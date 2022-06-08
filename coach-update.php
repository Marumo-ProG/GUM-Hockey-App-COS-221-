<?php
     include "db-api.php";

     // getting the information from the post request
     $id = $_POST["id"];
     $name = $_POST["name"];
     $gender = $_POST["gender"];
     $position = $_POST["position"];
     $experience = $_POST["experience"];
     $sDate = $_POST["sDate"];
     $eDate = $_POST["eDate"];


     $coach = $db->getCoach($id);
     $coach = $coach->fetch_assoc();

     if($name == ""){
         $name = $coach["Team_name"];
     }
     if($gender == ""){
        $gender = $team["Gender"];
    }
    if($position == ""){
        $position = $team["Position"];
    }
    if($experience == ""){
        $experience = $team["Experience"];
    }
    if($sDate == ""){
        $sDate = $team["Starting_Date"];
    }
    if($eDate == ""){
        $eDate = $team["Ending_Date"];
    }

     $db->coachUpdate($id, $name, $gender, $position, $experience, $sDate, $eDate);