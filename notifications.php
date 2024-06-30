<?php
require_once('dbinit.php');

//get all notifications of logged in user
$notifications = $dbHelper->getNotifications($_SESSION['ID_user']);

foreach ($notifications as $notif) {
    // i create a new array to easily display the notification in the template
    $displayNotif['id'] = $notif['ID_notif'];
    if ($notif['isRead'] == 0) {
        $displayNotif['class'] = "unread";
    } else {
        $displayNotif['class'] = "read";
    }
    $displayNotif['userAction'] = $dbHelper->getUsername($notif['k_action']);
    switch ($notif['type']) {
        case 'follow':
            $displayNotif['message'] = " started following you";
            break;
        case 'unfollow':
            $displayNotif['message'] = " unfollowed you";
            break;
        default:
            $displayNotif['message'] = " Unknown notification";
            break;
    }
}


// Base params
$templateParams['title'] = 'Notifications';
$templateParams['fileName'] = 'display_notif.php';
$templateParams['navbar'] = true;
$templateParams['jsFile'] = array('toggleReadStatus.js');

require_once('template/base.php');
