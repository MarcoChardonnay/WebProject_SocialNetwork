<?php
require_once('dbinit.php');

if(isset($_GET['query'])) {
    $query = $_GET['query'];
    // Sanitize $query to prevent SQL Injection
    $query = htmlspecialchars($query);
    $query = $dbHelper->real_escape_string($query);

    $results = $dbHelper->searchUsernames($query, $_SESSION['ID_user']); // Implement this method in your DBHelper class
    foreach ($results as &$user) {
        // print_r($user); echo "<br>";
        $user['ID_user'] = $dbHelper->getIDuserbyUsername($user['username']);
        // print_r($user);
        $user['following'] = $dbHelper->isFollowing($_SESSION['ID_user'], $user['ID_user']);
        print_r($user);
    }
    unset($user); // Break the reference with the last element

    // Output the results
    foreach($results as $user) {
        echo "<li>";
        echo $user['username']; // Already sanitized in the database
        // echo "<button>Test</button>";
        //echo the form with the hidden input
        echo "<form action='javascript:void(0);' method='POST'>";
        echo "<input type='hidden' name='following' value='".$user['following']."'>";
        echo "<input type='button' class='toggleFollow' value='".($user['following'] ? 'Unfollow' : 'Follow')."' data-user-id='S".$user['ID_user']."'>";
        echo "</form>";
        echo "</li>";
    }
}
?>