<?php
require_once("dbinit.php");

if(logout()){
    header("Location: login.php");
} else {
    echo "Error while logging out";
}

?>