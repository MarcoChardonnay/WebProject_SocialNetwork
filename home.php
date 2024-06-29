<?php
require_once("dbinit.php");

//retrieve latest n posts from users followed by the logged in user
$retrievedPosts = $dbHelper->getPostsFollowed($_SESSION['ID_user'], 10);
foreach ($retrievedPosts as &$post) {
    $post['k_user'] = $dbHelper->getUsername($post['k_user']);
    $post['description'] = substr($post['description'], 0, 100) . "...";
    $post['description'] = htmlspecialchars($post['description']);
}


// Base params
$templateParams['title'] = 'Home';
$templateParams['fileName'] = 'display_post_array.php';
$templateParams['navbar'] = true;
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';
