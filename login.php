<?php
require_once("bootstrap.php");

//redirect to home page if user is logged in
if(isUserLoggedIn()){
    header("Location: home.php");
}

// Base params
$templateParams['title'] = 'Login';
$templateParams['fileName'] = 'login_form.php';
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>