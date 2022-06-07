<?php
    include "db-api.php";
    $id = $_POST["id"];
    $name = $_POST["name"];
    $season = $_POST["season"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $winner = $_POST["winner"];

    $before = $db->retriveTournament($id);
    

    if($name == ""){
        $name = $before["Tournement_Name"]; 
    }
    if($season == ""){
        $season = $before["Tournement_Season"]; 
    }
    if($country == ""){
        $country = $before["Tournement_Location_Country"]; 
    }
    if($city == ""){
        $cityt = $before["Tournement_Location_City"]; 
    }
    if($winner == ""){
        $winner = $before["Tournement_Winner"]; 
    }

    $db->tournamentUpdate($id,$name, $season, $country, $city, $winner);
?>