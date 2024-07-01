<div class="notifcontainer">
    <ul>
        <?php foreach ($notifications as $notif) : ?>
            <li class="notif <?php echo $notif['class']; ?>">
                <?php echo $notif['userAction']. $notif['message'] ?>
                <form action="javascript:void(0);" method="POST">
                    <input type="hidden" name="containerclass" value="<?php echo $notif['class'] ?>">
                    <input type="button" class="toggleReadStatus" data-notif-id="<?php echo $notif['ID_notif']; ?>" value="<?php echo $notif['isRead'] == 0 ? 'Mark as Read' : 'Read'; ?>" <?php echo $notif['isRead'] == 1 ? ' disabled' : ''; ?>>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>