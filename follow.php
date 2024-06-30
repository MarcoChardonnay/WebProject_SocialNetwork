<?php
require_once('dbinit.php');
//check if $_POST is set, if not redirect to search.php. ! should not happen, just for safety
if (!isset($_POST['ID_user']) || !isset($_POST['following'])) {
    header("Location: search.php");
    exit;
}

//If POST is set
if (isset($_POST['ID_user']) && isset($_POST['following'])) {
    //I don't need to sanitize the input, but I need to make sure it's a boolean
    $followStatus = filter_var($_POST['following'], FILTER_VALIDATE_BOOLEAN); // Convert to boolean
    // Using toggleFollow to change the database
    $toggleSuccess = $dbHelper->toggleFollow($_SESSION['ID_user'], $_POST['ID_user'], $followStatus);

    // Add a Notification
    $actionType = $followStatus ? "unfollow" : "follow";
    $dbHelper->addNotification($_SESSION['ID_user'], $_POST['ID_user'], $actionType);

    if ($toggleSuccess) {
        // Return success message or new follow status (opposite of the current one)
        echo json_encode(["success" => true, "following" => !$followStatus]);
    } else {
        // Handle error
        echo json_encode(["success" => false]);
    }
} else {
    // Invalid request
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}
exit;
?>