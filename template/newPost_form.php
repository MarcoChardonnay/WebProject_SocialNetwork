<div class="form-wrapper">
    <form class="form" action="newPost.php" method="POST">
        <label for="image">Post image:</label>
        <input type="text" id="image" name="image" required><br><br>

        <label for="descrtext">Description:</label>
        <!-- <input type="text" id="description" name="description" required><br><br> -->
        <textarea id="descrtext" name="descrtext" rows="4" cols="50" required></textarea><br>
        <span id="counter">0/255</span><br>

        <input type="submit" value="Add new post">
    </form>
    <?php if (isset($templateParams["posterror"])) : ?>
        <div class="error" role="alert" aria-live="assertive">
            <p><?php echo $templateParams["posterror"] ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($templateParams["postsuccess"])) : ?>
        <div class="success" role="alert" aria-live="assertive">
            <p><?php echo $templateParams["postsuccess"] ?></p>
        </div>
    <?php endif; ?>
</div>