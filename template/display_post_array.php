<?php if (isset($templateParams['isProfilePage']) && $templateParams['isProfilePage']) : ?>
    <div class="text-wrap">
        <h1> <?php echo $user['username']; ?> </h1>
        <div class="userdata">
            <h2 id="followers"><?php echo $followers ?> Followers</h2>
            <h2 id="following"><?php echo $following ?> Following</h2>
        </div>
    </div>
<?php endif; ?>

<div class="postcontainer">
    <?php if (empty($retrievedPosts)) : ?>
        <?php if (isset($templateParams['isHomePage']) && $templateParams['isHomePage']) : ?>
            <p>There are no posts to show. You have to follow someone first.
            <a href="search.php">Search for users</a></p>
        <?php endif; ?>
        <?php if (isset($templateParams['isProfilePage']) && $templateParams['isProfilePage']) : ?>
            <p>There are no posts to show. <a href="post.php">Post Something now!</a></p>
        <?php endif; ?>
    <?php endif; ?>
    <?php foreach ($retrievedPosts as $post) : ?>
        <div class="post">
            <div class="userhandle">
                <p><?php echo $post['k_user']; ?></p>
            </div>
            <p class="description"><?php echo $post['description']; ?></p>
            <div class="postfooter">
                <ul>
                    <li><a href="post_viewer.php?post=<?php echo $post['ID_post']; ?>" class="link">View more</a></li>
                    <li>
                        <p><?php echo $post['datetime'] ?></p>
                    </li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>