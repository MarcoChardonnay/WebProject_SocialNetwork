<?php
require_once('dbinit.php');

//get random users
$randomUsers = $dbHelper->getRandomUsers(10, $_SESSION['ID_user']);
// var_dump($randomUsers); echo "<br>";
foreach ($randomUsers as &$user) {
    $user['following'] = $dbHelper->isFollowing($_SESSION['ID_user'], $user['ID_user']);
}
unset($post); // Break the reference with the last element
// var_dump($randomUsers); echo "<br>";
// Base params
$templateParams['title'] = 'Search';
$templateParams['fileName'] = 'search_field.php';
$templateParams['navbar'] = true;
$templateParams['jsFile'] = array('toggleFollow.js');

require_once ('template/base.php');
?>