<?php
    include "db-api.php";
    
    $name = $_POST["name"];
    $season = $_POST["season"];
    $country = $_POST["country"];
    $city = $_POST["city"];


    $db->registerTournament($name, $season, $country, $city);
?>