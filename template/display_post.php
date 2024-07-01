<div class="postcontainer">
    <div class="post">
        <div class="userhandle">
            <p><?php echo $post['k_user']; ?></p>
        </div>
        <div class="description">
            <p><?php echo $post['description']; ?></p>
        </div>
        <div class="postfooter">
            <ul>
                <li>
                    <a href="home.php" class="icon-link">
                        <span class="icon fa-light fa-house"></span>
                        <span class="">back to Feed</span>
                    </a>
                </li>
                <li>
                    <p>posted on <?php echo $post['datetime'] ?></p>
                </li>
            </ul>
        </div>
    </div>
</div>