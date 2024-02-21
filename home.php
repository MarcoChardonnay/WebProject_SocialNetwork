<?php
require_once("bootstrap.php");

//redirect to login page if user is not logged in
if(!isUserLoggedIn()){
    header("Location: login.php");
}

//retrieve latest n posts from users followed by the logged in user
$retrievedPosts = $dbHelper->getPostsFollowed($_SESSION['ID_user'], 10);

// Base params
$templateParams['title'] = 'Home';
$templateParams['fileName'] = 'home_page.php';
$templateParams['navbar'] = true;
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';
?>