<?php
//start session, define constants, create new instance of DatabaseHelper and connect to db
session_start();
require_once('db/database.php');
require_once('utils/functions.php');

$dbHelper = new DatabaseHelper("localhost","root","","socialnetwork");

// Pages that do not require the user to be redirected if logged in
$exclude_check = ['login.php', 'registration.php'];

// Get the current script's name and check if it's in the exclude list
$current_page = basename($_SERVER['PHP_SELF']);
if (!in_array($current_page, $exclude_check) && !isUserLoggedIn()) {
    header("Location: login.php");
    exit; // Don't forget to exit after sending the header
}
?>