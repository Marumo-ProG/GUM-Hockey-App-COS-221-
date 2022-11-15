<?php 
    include "db-api.php";

    $umpire = $_POST["umpire"];
    $tournamentId = $_POST["tournamentID"];
    $team1 = $_POST["team1"];
    $team2 = $_POST["team2"];
    $dmatch = $_POST["dMatch"];
    $altMatch = $_POST["altMatch"];
    $duration = $_POST["duration"];
    $round = $_POST["round"];

    $db->registerGame($umpire, $tournamentId, $team1, $team2, $dmatch, $altMatch, $duration, $round);

?>