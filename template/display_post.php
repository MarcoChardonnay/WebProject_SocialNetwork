<div class="postcontainer">
    <div class="post">
        <div class="userhandle">
            <p><?php echo $post['k_user']; ?></p>
        </div>
        <div class="image-container">
            <!-- <img src="<?php echo UPLOAD_DIR . $post['img']; ?>" alt="Post Image"> -->
        </div>
        <div class="description">
            <p><?php echo $post['imgdescription']; ?></p>
        </div>
        <div class="footer">
            <ul>
                <li>
                    <p><?php echo $post['datetime'] ?></p>
                </li>
                <li>
                    <span id="heart-icon" class="icon fa-regular fa-heart"></span>
                    <span class="nav-text">Likes</span>
                </li> <!-- fa-solid fa-heart when liked --> <!-- do i need an aria? -->
                <li>
                    <a href="home.php" class="icon-link">
                        <span class="icon fa-light fa-house"></span>
                        <span class="">back to Home</span>
                    </a>
                </li>
        </div>
    </div>
</div>