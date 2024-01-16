<div class="form-wrapper">
    <form class="form" action="registration.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpass">Confirm Password</label>
        <input type="password" id="confirmpass" name="confirmpass"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>

        <label for="notification">Receive Notifications:</label>
        <input type="checkbox" id="notification" name="notification" value="1"><br><br>

        <label for="profile_picture">Profile Picture URL:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>

        <input type="submit" value="Register">
    </form>
</div>
