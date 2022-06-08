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
        $name = $before["Tournament_Name"]; 
    }
    if($season == ""){
        $season = $before["Tournament_Season"]; 
    }
    if($country == ""){
        $country = $before["Tournament_Location_Country"]; 
    }
    if($city == ""){
        $cityt = $before["Tournament_Location_City"]; 
    }
    if($winner == ""){
        $winner = $before["Tournament_Winner"]; 
    }

    $db->tournamentUpdate($id,$name, $season, $country, $city, $winner);
?>