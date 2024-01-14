<?php
require_once("bootstrap.php");

//redirect to home page if user is logged in
if(isUserLoggedIn()){
    header("Location: home.php");
}

// Base params
$templateParams['title'] = 'Registration';
$templateParams['fileName'] = 'registration_form.php';
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>