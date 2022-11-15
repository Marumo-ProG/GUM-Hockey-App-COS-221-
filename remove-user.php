<?php
    include "db-api.php";
    $email = $_POST["email"];

    $db->removeUser($email);
    echo "<script>window.location.href='./admin.php'; </script>"

?>