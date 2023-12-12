<?php
require_once("bootstrap.php");

//redirect to login page if user is not logged in
if(!isUserLoggedIn()){
    echo "User is not logged in";
    header("Location: login.php");
}

//echo "home.php"; for debugging purposes
echo ("<p style='font-size:3em'>This is the home page</p>");
echo "User ID: " . $_SESSION['ID_user']; 
?>