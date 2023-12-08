<?php
require_once("bootstrap.php");

//redirect to home page if user is logged in
if(isset($_SESSION['ID_user'])){
    header("Location: home.php");
}

//echo "login.php"; for debugging purposes
echo ("<p style='font-size:3em'>This is the login page</p>");

//for debugging purposes
echo ("<form action='debugUser.php' method='post'>
        <input type='submit' value='Login for debugging purposes'>
        </form>");

?>