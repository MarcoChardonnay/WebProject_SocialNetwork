<?php
require_once("bootstrap.php");

if(!isUserLoggedIn()){
    header("Location: login.php");
}

if(logout()){
    header("Location: login.php");
} else {
    echo "Error while logging out";
}

?>