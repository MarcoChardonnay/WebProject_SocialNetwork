<div class="userscontainer">
    <p>Suggested users:</p>
    <ul>
        <?php if(empty($randomUsers)) : ?>
            <p>Looks like you're the first one here! Invite more poets to join</p>
        <?php else : ?>
        <?php foreach ($randomUsers as $u) : ?>
            <?php //var_dump($u); ?>
            <li>
                <?php echo $u['username'] ?>
                <form action="javascript:void(0);" method="POST">
                    <input type="hidden" name="following" value="<?php echo $u['following'] ?>">
                    <!-- Since it's a loop, we can use the ID for the button -->
                    <!-- we use class and assign a different data-user-id equal to the ID_user -->
                    <!-- we use X to differentiate from the search -->
                    <input type="button" class="toggleFollow" value="<?php echo $u['following'] ? 'Unfollow' : 'Follow' ?>" data-user-id="<?php echo $u['ID_user'] ?>">
                </form>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>