<?php
require_once("bootstrap.php");

//redirect to home page if user is logged in
if(!isUserLoggedIn()){
    header("Location: login.php");
}

//get user data
$user = $dbHelper->getUserInfo($_SESSION['ID_user']);

// Base params
$templateParams['title'] = 'Settings';
$templateParams['fileName'] = 'settings_form.php';
$templateParams['navbar'] = true;
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>