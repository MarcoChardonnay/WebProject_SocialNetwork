<?php
//fake login, just set the user ID to 999
require_once("bootstrap.php");
$_SESSION['ID_user'] = 999;
//debug info
//echo "User ID set to: ";
//var_dump($_SESSION['ID_user']);
//redirect
header("refresh:1; url=login.php");
?>