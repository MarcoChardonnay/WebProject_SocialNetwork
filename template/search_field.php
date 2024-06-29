<input type="text" id="searchUsers" placeholder="Search username...">
<div id="searchResult"></div>
<!-- Search works but there's no button to click -->

<div class="userscontainer">
    <p>Suggested users:</p>
    <ul>
        <?php foreach ($randomUsers as $u) : ?>
            <?php //var_dump($u) ?>
            <li>
                <?php echo $u['username'] ?>
                <form action="follow.php" method="POST"> <!-- Should also be performed using AJAX -->
                    <input type="hidden" name="ID_user" value="<?php echo $u['ID_user'] ?>">
                    <input type="hidden" name="following" value="<?php echo $u['following'] ?>">
                    <input type="submit" value="<?php echo $u['following'] ? 'Unfollow' : 'Follow' ?>">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>