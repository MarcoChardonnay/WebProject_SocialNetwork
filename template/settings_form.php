<!-- logout button when pressed calls logout() function -->
<div class="logout">
    <input type="button" value="Logout" onclick="logout();">
</div>
<!-- settings form -->
<div class="form-wrapper">
    <h1>Here you can modify your profile informations</h1>
    <form class="form" action="registration.php" method="POST">
        <h2>Your username: <?php echo $user['username']; ?> </h2>
        <label for="username">New Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="oldpassword">Current Password:</label>
        <input type="password" id="oldpassword" name="oldpassword" required><br><br>

        <label for="newpassword">New Password:</label>
        <input type="password" id="newpassword" name="newpassword" required><br><br>

        <label for="confirmnewpass">Confirm New Password</label>
        <input type="password" id="confirmnewpass" name="confirmnewpass">

        <h2>Your email: <?php echo $user['email']; ?></h2>
        <label for="email">New Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <h2>Previous setting:
            <?php
            echo "Notifications " . (($user['username'] == 0) ? "enabled" : "disabled");
            ?>
        </h2>
        <label for="notification">Receive Notifications:</label>
        <input type="checkbox" id="notification" name="notification" value="1" required><br><br>

        <h2>Old profile picture: [image]</h2>
        <label for="profile_picture">Profile Picture URL:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>

        <input type="submit" value="Submit changes">
    </form>
</div>