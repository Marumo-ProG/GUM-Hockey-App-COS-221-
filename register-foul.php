<?php
    include "db-api.php";
    $time = new DateTime();
    $time = $time->format('Y-m-d H:i:s');
    $gameId = $_POST["game"];
    $player = $_POST["player"];
    $team = $_POST["team"];
    $card = $_POST["card"];
    $type = $_POST["type"];
    $t = "Fouls";

    $db->registerEvent($time, $t, $gameId);
    $db->registerFoul($gameId, $player, $card, $type);

?>