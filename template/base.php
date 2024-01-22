<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <!-- <link rel="icon" href="resources/favicon/favicon.ico" type="image/x-icon"> -->

    <!-- navbar icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <title>
        <?php echo $templateParams['title']; ?>
    </title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="home.php">
                    <span class="icon fa-light fa-house"></span>
                    <span class="nav-text">Feed</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon fa-regular fa-magnifying-glass"></span>
                    <span class="nav-text">Search</span></a>
            </li>
            <li>
                <a href="#">
                    <span class="icon fa-solid fa-heart"></span>
                    <span class="nav-text">Notifications</span></a>
            </li>
            <li>
                <a href="profile.php">
                    <span class="icon fa-regular fa-user"></span>
                    <span class="nav-text">Profile</span></a>
            </li>
            <li>
                <a href="settings.php">
                    <span class="icon fa-light fa-sliders"></span>
                    <span class="nav-text">Settings</span></a>
            </li>
        </ul>
    </nav>
    <main>
        <?php
        if (isset($templateParams['fileName'])) {
            require_once $templateParams['fileName'];
        }
        ?>
    </main>
</body>

</html>