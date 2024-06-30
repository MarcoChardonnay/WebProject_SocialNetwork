<?php
require_once('dbinit.php');
if (!isset($_POST['ID_notif']) || !isset($_POST['isRead'])) {
    header("Location: notifications.php");
    exit;
}

if (isset($_POST['ID_notif']) && isset($_POST['isRead'])) {
    $isRead = filter_var($_POST['isRead'], FILTER_VALIDATE_BOOLEAN); // Convert to boolean
    $toggleSuccess = $dbHelper->toggleReadStatus($_POST['ID_notif'], $_POST['isRead']);
    if ($toggleSuccess) {
        echo json_encode(["success" => true, "isRead" => !$isRead]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}
exit;
?>