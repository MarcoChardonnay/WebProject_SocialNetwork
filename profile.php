<?php
require_once("bootstrap.php");

//redirect to login page if user is not logged in
// TEMPORARILY DISABLED FOR TESTING PURPOSES
// if(!isUserLoggedIn()){
//     echo "User is not logged in";
//     header("Location: login.php");
// }

// Base params
$templateParams['title'] = 'Profile';
$templateParams['fileName'] = 'profile_form.php';
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>