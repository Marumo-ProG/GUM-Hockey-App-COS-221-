<?php
//includig the database singleton
include "db-api.php";

// making a database instance to insert a user in the database
//$db = Database::instance();

// extracting the users information from the post request
$email = $_POST["email"];
$password = $_POST["password"];

// we will retrieve the user from the database using the retrieve user function
if($db->login($email, $password)){
    echo "user login successful";
}else
    echo "user not found, please check your information";
