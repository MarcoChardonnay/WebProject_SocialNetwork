<?php
require_once('bootstrap.php');

//redirect to login page if user is not logged in
// TEMPORARILY DISABLED FOR TESTING PURPOSES
if(!isUserLoggedIn()){
    // echo "User is not logged in";
    header("Location: login.php");
}

//get user data
$user = $dbHelper->getUserInfo($_SESSION['ID_user']);
//retrieve posts by user ID
$retrievedPosts = $dbHelper->getPostsByID($_SESSION['ID_user']);

// Base params
$templateParams['title'] = 'Profile';
$templateParams['fileName'] = 'profile_page.php';
$templateParams['navbar'] = true;
//$templateParams['scriptFileName'] = '';

require_once ('template/base.php');

?>