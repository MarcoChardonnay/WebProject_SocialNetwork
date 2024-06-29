<div class="form-wrapper">
    <form class="form" action="registration.php" method="POST">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" pattern="[a-zA-Z0-9._]+" title="Only alphanumeric characters, underscores [_], and periods [.] are allowed." aria-describedby="usernameHelp" required><br>
                <span id="usernameHelp" class="form-descr">Use letters, numbers, periods, and underscores only. Must be under 30 characters. For example: john_doe.123</span>
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <span id="passwordHelp" class="form-descr">Use letters, numbers, and special characters (allowed: !@#$%&*). For example: password123!.</span>
            </li>
            <li>
                <label for="confirmpass">Confirm Password:</label>
                <input type="password" id="confirmpass" name="confirmpass" required>
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" aria-describedby="emailFeedback" required>
                <div id="emailFeedback" aria-live="polite"></div>
            </li>
            <li>
                <label for="notification">Receive Notifications:</label>
                <input type="checkbox" id="notification" name="notification" value="1">
            </li>
            <li>
                <input type="submit" value="Register">
            </li>
        </ul>
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