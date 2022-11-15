<?php
    include "db-api.php";

    // getting the information from the post request
    $name = $_POST["name"];
    $coach_id = $_POST["coach"];
    $captain = $_POST["captain"];
    $origin = $_POST["origin"];

    $db->registerTeam($name, $coach_id, $captain, $origin);
?>