<?php
require_once('dbinit.php');

//get all notifications of logged in user
$notifications = $dbHelper->getNotifications($_SESSION['ID_user']);
// print_r($notifications); echo "<br><br>";
$displayNotifs = []; // init empty array
foreach ($notifications as &$notif) {
    // i create a new array to easily display the notification in the template
    if ($notif['isRead'] == 0) {
        $notif['class'] = "unread";
    } else {
        $notif['class'] = "read";
    }
    $notif['userAction'] = $dbHelper->getUsername($notif['k_action']);
    switch ($notif['type']) {
        case 'follow':
            $notif['message'] = " started following you";
            break;
        case 'unfollow':
            $notif['message'] = " unfollowed you";
            break;
        default:
            $notif['message'] = " Unknown notification";
            break;
    }
}
unset($notif);
// print_r($notifications); echo "<br>";

// Base params
$templateParams['title'] = 'Notifications';
$templateParams['fileName'] = 'display_notif.php';
$templateParams['navbar'] = true;
$templateParams['jsFile'] = array('toggleReadStatus.js');

require_once('template/base.php');
