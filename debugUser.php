<?php
require_once("bootstrap.php");
$_SESSION['ID_user'] = 999;
echo "User ID set to: ";
var_dump($_SESSION['ID_user']);
header("refresh:1; url=login.php");
?>