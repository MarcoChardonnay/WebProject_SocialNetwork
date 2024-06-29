<?php
require_once("dbinit.php");

//get user data
$user = $dbHelper->getUserInfo($_SESSION['ID_user']);

//if settings form is submitted

// Base params
$templateParams['title'] = 'Settings';
$templateParams['fileName'] = 'settings_form.php';
$templateParams['navbar'] = true;
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>