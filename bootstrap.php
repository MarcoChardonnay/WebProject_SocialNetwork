<?php
//start session, define constants, create new instance of DatabaseHelper and connect to db
session_start();
define("UPLOAD_DIR", "./resources/img/");
require_once('db/database.php');
require_once('utils/functions.php');

$dbHelper = new DatabaseHelper("localhost","root","","socialnetwork");
?>