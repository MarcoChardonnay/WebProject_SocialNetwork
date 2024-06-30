<div class="notifcontainer <?php echo $displayNotif['class'] ?>">
    <ul>
        <?php foreach ($notifications as $notif) : ?>
            <li>
                <?php echo $displayNotif['userAction']. $displayNotif['message'] ?>
                <form action="javascript:void(0);" method="POST">
                    <input type="hidden" name="containerclass" value="<?php echo $displayNotif['class'] ?>">
                    <input type="button" class="toggleReadStatus" data-notif-id="<?php echo $displayNotif['id']; ?>" value="Mark as <?php echo $notif['isRead'] == 0 ? 'Read' : 'Unread'; ?>">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>