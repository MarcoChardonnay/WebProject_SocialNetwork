<div class="notifcontainer">
    <ul>
        <?php foreach ($notifications as $notif) : ?>
            <li class="<?php echo $displayNotif['class'] ?>">
                <?php echo $displayNotif['userAction']. $displayNotif['message'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>