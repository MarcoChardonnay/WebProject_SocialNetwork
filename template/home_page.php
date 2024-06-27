<div class="postcontainer">
    <?php foreach ($retrievedPosts as $post) : ?>
        <div class="post">
            <div class="userhandle">
                <p><?php echo $post['k_user']; ?></p>
            </div>
            <div class="image-container">
                <!-- <img src="<?php echo UPLOAD_DIR . $post['img']; ?>" alt="Post Image"> -->
            </div>
            <p class="description"><?php echo $post['imgdescription']; ?></p>
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