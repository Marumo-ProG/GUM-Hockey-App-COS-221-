<?php
    include "db-api.php";

    $license = rand(999999999,9999999999);

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $games = $_POST["games"];
    $age = $_POST["age"];
    $experience = $_POST["experience"];

    $db->registerUmpire($license, $name,$surname, $games, $age, $experience);
?>