<div class="form-wrapper">
    <h1>Here you can modify your profile informations</h1>
    <form class="form" action="registration.php" method="POST">
        <h2>Old username:</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="Test" required><br><br>

        <h2>Old password:</h2>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpass">Confirm New Password</label>
        <input type="password" id="confirmpass" name="confirmpass">

        <h2>Old email:</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <h2>Old phone:</h2>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>

        <h2>Previous setting:</h2>
        <label for="notification">Receive Notifications:</label>
        <input type="checkbox" id="notification" name="notification" value="1"><br><br>

        <h2>Old profile picture: [image]</h2>
        <label for="profile_picture">Profile Picture URL:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>

        <input type="submit" value="Submit changes">
    </form>
</div>