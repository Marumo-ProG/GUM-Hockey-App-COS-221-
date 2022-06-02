<?php
 //includig the database singleton
 include "db-api.php";

// making a database instance to insert a user in the database
//$db = Database::instance();

// extracting the users information from tje post request
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"]; 
$email = $_POST["email"];
$password = $_POST["password"];
$user = $_POST["is_admin"];

// hashing the password before storing it in the database;
$password = password_hash($password, PASSWORD_DEFAULT);

// data validatoin will be done in the client side

// adding user using the connected database;
$db->signUser($firstName, $lastName, $email, $password, $user);

// reload the page with a confirmation message

?>