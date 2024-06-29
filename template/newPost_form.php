<div class="form-wrapper">
    <form class="form" action="newPost.php" method="POST">

        <label for="descrtext">Unleash your creativity:</label>
        <textarea id="descrtext" name="descrtext" rows="4" cols="50" required></textarea>
        <span id="counter">0/1500</span>

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