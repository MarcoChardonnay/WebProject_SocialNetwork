<div class="notifcontainer">
    <ul>
        <?php foreach ($notifications as $notif) : ?>
            <li class="notif <?php echo $notif['class'] ?>">
                <?php echo $notif['userAction']. $notif['message'] ?>
                <form action="javascript:void(0);" method="POST">
                    <input type="hidden" name="containerclass" value="<?php echo $notif['class'] ?>">
                    <input type="button" class="toggleReadStatus" data-notif-id="<?php echo $notif['ID_notif']; ?>" value="Mark as <?php echo $notif['isRead'] == 0 ? 'Read' : 'Unread'; ?>">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>