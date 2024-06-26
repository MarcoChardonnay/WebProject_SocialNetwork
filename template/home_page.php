<div class="postcontainer">
    <?php foreach ($retrievedPosts as $post) : ?>
        <div class="post">
            <div class="image-container">
                <!-- <img src="<?php echo UPLOAD_DIR . $post['img']; ?>" alt="Post Image"> -->
            </div>
            <p class="description"><?php echo $post['imgdescription'] ?></p>
        </div>
    <?php endforeach; ?>
</div>