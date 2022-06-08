<?php
    include "db-api.php";
    $time = new DateTime();
    $time = $time->format('Y-m-d H:i:s');
    $gameId = $_POST["game"];
    $onPlayer = $_POST["onPlayer"];
    $offPlayer = $_POST["offPlayer"];
    $team = $_POST["team"];
    $position = $_POST["position"];
    $t = "Substitution";

    $db->registerEvent($time, $t, $gameId);
    $db->regiterSub($gameId, $onPlayer, $offPlayer, $team, $position);
?>