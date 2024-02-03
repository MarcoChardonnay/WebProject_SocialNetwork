<div class="form-wrapper">
    <form class="form" action="login.php" method="POST">
        <label for="username">Username or Email:</label>
        <input type="text" id="loginInput" name="loginInput" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <?php if (isset($templateParams["loginerror"])) : ?>
        <div class="error" role="alert" aria-live="assertive">
            <p><?php echo $templateParams["loginerror"] ?></p>
        </div>
    <?php endif; ?>
    <p>Not registered? <a href="registration.php">Register here</a></p>
</div>