<div class="form-wrapper">
    <form class="form" action="registration.php" method="POST">
        <label for="username">Username:</label>
        <label for="username">The accepted characters are letters, numbers, period and underscores</label>
        <input type="text" id="username" name="username" pattern="[a-zA-Z0-9_.]+" title="only alphanumeric characters underscores[_] and periods[.]" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpass">Confirm Password</label>
        <input type="password" id="confirmpass" name="confirmpass"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="notification">Receive Notifications:</label>
        <input type="checkbox" id="notification" name="notification" value="1"><br><br>

        <label for="profile_picture">Profile Picture URL:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>

        <input type="submit" value="Register">
    </form>
    <p>Already registered? <a href="login.php">Go to login</a></p>
    <?php if (isset($templateParams["registrationerror"])) : ?>
        <div class="error" role="alert" aria-live="assertive">
            <p><?php echo $templateParams["registrationerror"] ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($templateParams["registrationsuccess"])) : ?>
        <div class="success" role="alert" aria-live="assertive">
            <p><?php echo $templateParams["registrationsuccess"] ?></p>
        </div>
    <?php endif; ?>
</div>
