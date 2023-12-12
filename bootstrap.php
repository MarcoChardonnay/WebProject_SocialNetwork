<?php
//start session, define constants, create new instance of DatabaseHelper and connect to db
session_start();
define("UPLOAD_DIR", "./resources/img/");
require_once('db/database.php');

function isUserLoggedIn(){
    //var_dump($_SESSION);
    return isset($_SESSION['ID_user']);
}

$dbHelper = new DatabaseHelper("localhost","root","","socialnetwork");
?>