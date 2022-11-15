<?php
include "db-api.php";
$time = new DateTime();
$time = $time->format('Y-m-d H:i:s');
$gameId = $_POST["game"];
$player = $_POST["player"];


if(isset($_POST["intercept"])){
    $intercept = $_POST["intercept"];
} else $intercept = false;

$type = $_POST["type"];
$t = "Fouls";

$db->registerEvent($time, $t, $gameId);
$db->registerHits($gameId, $player, $type, $intercept);
