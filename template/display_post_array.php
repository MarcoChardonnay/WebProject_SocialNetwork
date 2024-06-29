<?php if (isset($templateParams['isProfilePage']) && $templateParams['isProfilePage']) : ?>
    <div class="text-wrap">
        <h1> <?php echo $user['username']; ?> </h1>
        <!-- <h2>Bio</h2> -->
        <div class="userdata">
            <h3 id="followers"><?php echo $followers ?> Followers</h3>
            <h3 id="following"><?php echo $following ?> Following</h3>
        </div>
    </div>
<?php endif; ?>
<div class="postcontainer">
    <?php foreach ($retrievedPosts as $post) : ?>
        <div class="post">
            <div class="userhandle">
                <p><?php echo $post['k_user']; ?></p>
            </div>
            <p class="description"><?php echo $post['description']; ?></p>
            <div class="footer">
                <ul>
                    <li><a href="post_viewer.php?post=<?php echo $post['ID_post']; ?>" class="link">View more</a></li>
                    <li>
                        <p><?php echo $post['datetime'] ?></p>
                    </li>
            </div>
        </div>
    <?php endforeach; ?>
</div>