<?php
require_once('dbinit.php');

if (isset($_GET['post']) && is_numeric($_GET['post'])) { //ensure that the value is a number
    $ID_post = $_GET['post']; //get ID of the post from the URL
    $post = $dbHelper->getPostInfo($ID_post); //from ID post i get the post
    $post['k_user'] = $dbHelper->getUsername($post['k_user']); //from ID post i get the username
    $post['description'] = htmlspecialchars($post['description']); //sanitize the description, no special chars
}else {
    //if no post is selected, redirect to home
    header("Location: home.php");
}


// Base params
$templateParams['title'] = 'Profile';
$templateParams['fileName'] = 'display_post.php';
$templateParams['navbar'] = true;
//$templateParams['scriptFileName'] = '';

require_once ('template/base.php');

?>