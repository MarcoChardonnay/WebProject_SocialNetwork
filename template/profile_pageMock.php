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
            <img src="<?php echo UPLOAD_DIR . $post['img']; ?>" alt="Post Image">
        </div>
        <p class="description"><?php echo $post['imgdescription'] ?></p>
    </div>
    <?php endforeach; ?>
    <div class="post">
        <div class="image-container">
            <img src="uploads/wickedAD.jpg" alt="Post Image">
        </div>
        <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate in necessitatibus voluptas? Cum, et a. Alias dolores molestiae eligendi sunt?</p>
    </div>
    <div class="post">
        <div class="image-container">
            <img src="uploads/flowers.jpg" alt="Post Image">
        </div>
        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, quidem voluptatem quaerat suscipit deleniti aut!</p>
    </div>
    <div class="post">
        <div class="image-container">
            <img src="uploads/elphaba.jpg" alt="Post Image">
        </div>
        <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident quia dicta labore laudantium quidem maiores!</p>
    </div>
</div>