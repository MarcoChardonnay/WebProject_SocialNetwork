<?php
require_once('dbinit.php');

//get user data
$user = $dbHelper->getUserInfo($_SESSION['ID_user']);

//get the number of followers (accounts that are following the user)
$followers = $dbHelper->getFollowers($_SESSION['ID_user']); //get the number of followers of the user

//get the number of following (accounts followed by the user)
$following = $dbHelper->getFollowing($_SESSION['ID_user']); //get the number of following of the user

//retrieve posts by user ID
$retrievedPosts = $dbHelper->getPostsByID($_SESSION['ID_user']); //get all posts of the user logged in session

foreach ($retrievedPosts as &$post) {
    $post['k_user'] = $dbHelper->getUsername($post['k_user']);
    $post['description'] = substr($post['description'], 0, 100) . "...";
    $post['description'] = htmlspecialchars($post['description']);
}
unset($post); // Break the reference with the last element
// Base params
$templateParams['title'] = 'Calliope - Profile';
$templateParams['fileName'] = 'display_post_array.php';
$templateParams['navbar'] = true;
$templateParams['isProfilePage'] = true;
//$templateParams['scriptFileName'] = '';

require_once ('template/base.php');

?>