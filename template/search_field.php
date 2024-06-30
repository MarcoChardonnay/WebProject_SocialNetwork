<input type="text" id="searchUsers" placeholder="Search username...">
<div class="userscontainer">
    <p>Search results:</p>
    <ul id="searchResult">
        <!-- Results will be displayed here -->
    </ul>
</div>
<!-- Search works but there's no button to click -->

<div class="userscontainer">
    <p>Suggested users:</p>
    <ul>
        <?php foreach ($randomUsers as $u) : ?>
            <?php //var_dump($u); ?>
            <li>
                <?php echo $u['username'] ?>
                <form action="javascript:void(0);" method="POST">
                    <input type="hidden" name="following" value="<?php echo $u['following'] ?>">
                    <!-- Since it's a loop, we can use the ID for the button -->
                    <!-- we use class and assign a different data-user-id equal to the ID_user -->
                    <!-- we use X to differentiate from the search -->
                    <input type="button" class="toggleFollow" value="<?php echo $u['following'] ? 'Unfollow' : 'Follow' ?>" data-user-id="X<?php echo $u['ID_user'] ?>">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>