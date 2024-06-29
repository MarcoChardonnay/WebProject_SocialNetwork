<?php
require_once('dbinit.php');

if(isset($_GET['query'])) {
    $query = $_GET['query'];
    // Sanitize $query to prevent SQL Injection
    $query = htmlspecialchars($query);
    $query = $dbHelper->real_escape_string($query);

    $results = $dbHelper->searchUsernames($query); // Implement this method in your DBHelper class

    foreach($results as $user) {
        echo '<div>' . htmlspecialchars($user['username']) . '</div>';
    }
}
?>