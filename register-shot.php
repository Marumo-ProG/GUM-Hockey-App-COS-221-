<?php
    include "db-api.php";
    $time = new DateTime();
    $time = $time->format('Y-m-d H:i:s');
    $gameId = $_POST["game"];
    $player = $_POST["player"];
    if(isset($_POST["assisted"])){
        $assist = $_POST["assisted"];
    } else $assist = false;
    if(isset($_POST["saved"])){
        $saved = 1;
    } else $saved = 0;

    if(isset($_POST["intercept"])){
        $intercept = 1;
    } else $intercept = 1;
    

    $type = $_POST["type"];
    $t = "Fouls";

    $db->registerEvent($time, $t, $gameId);
    $db->registerShot($gameId, $player, $type, $assist, $saved, $intercept);

?>