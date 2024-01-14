<div class="form-wrapper">
    <p>Settings</p>
    <p>Here you can modify your profile informations</p>
    <form class="form" action="registration.php" method="POST">
        <p>Old username:</p>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="Test" required><br><br>

        <p>Old password:</p>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpass">Confirm New Password</label>
        <input type="password" id="confirmpass" name="confirmpass">

        <p>Old email:</p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <p>Old phone:</p>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>

        <p>Previous setting:</p>
        <label for="notification">Receive Notifications:</label>
        <input type="checkbox" id="notification" name="notification" value="1"><br><br>

        <p>Old profile picture: [image]</p>
        <label for="profile_picture">Profile Picture URL:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>

        <input type="submit" value="Submit changes">
    </form>
</div>
