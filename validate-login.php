<?php
session_start();
//includig the database singleton
include "db-api.php";
$_SESSION['email'];

// making a database instance to insert a user in the database
//$db = Database::instance();

// extracting the users information from the post request
$email = $_POST["email"];
$password = $_POST["password"];

// we will retrieve the user from the database using the retrieve user function
if($db->login($email, $password)){
    
    $_SESSION['email'] = $email;
    // load the required page for admin and normal users
    $user = $db->retrieveUser($email);
    $user = $user->fetch_assoc();
    if($user["is_admin"] == "Yes"){
        echo "<script>alert('Welcome back, ".$user["First_Name"]."'); window.location.href='./admin.php'; </script>";
    }else {
        echo "<script>alert('Welcome back, ".$user["First_Name"]."'); window.location.href='./user.php'; </script>";
    }
    
}else
    // load the same page but with message
    echo "<script>alert('User not found, please try again'); history.back();</script>";
