<div class="pfp">
    <div class="image-container">
        <img src="https://wallpaperaccess.com/full/1642272.jpg" alt="">
    </div>
</div>

<div class="text-wrap">
    <h1> <?php echo $user['username']; ?> </h1>
    <h2>Bio</h2>
    <div class="userdata">
        <h3 id="followers">__ Followers</h3>
        <h3 id="following">__ Following</h3>
    </div>
</div>

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