<?php
require_once('dbinit.php');
if (!isset($_POST['ID']) || !isset($_POST['isRead'])) {
    header("Location: notifications.php");
    exit;
}

if (isset($_POST['ID']) && isset($_POST['isRead'])) {
    $IDnotif = $_POST['ID'] ?? null;
    $isRead = $_POST['isRead'] ?? null;
    $IDnotif = (int)$IDnotif;
    $isRead = (int)$isRead;
    $toggleSuccessNotif = $dbHelper->toggleReadStatus($IDnotif, $isRead);

    if ($toggleSuccessNotif) {
        // header('Content-Type: application/json');
        echo json_encode(["success" => true, "isRead" => !$isRead]);
    } else {
        // header('Content-Type: application/json');
        echo json_encode(["success" => false]);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}
exit;
?>