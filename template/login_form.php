<h1 class="webname">Calliope</h1>
<h2 class="websubtitle">Are you a tortured poet? Share your best verses with the community</h2>
<div class="form-wrapper">
    <form class="form" action="login.php" method="POST">
        <ul>
            <li>
                <label for="loginInput">Username or Email:</label>
                <input type="text" id="loginInput" name="loginInput" required>
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </li>
            <li>
                <input type="submit" value="Login">
            </li>
        </ul>
    </form>
    <?php if (isset($templateParams["loginerror"])) : ?>
        <div class="error" role="alert" aria-live="assertive">
            <p><?php echo $templateParams["loginerror"] ?></p>
        </div>
    <?php endif; ?>
    <p>Not registered? <a href="registration.php">Register here</a></p>
</div>