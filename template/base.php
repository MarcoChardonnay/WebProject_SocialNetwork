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
                <!-- idea: usare due span dentro a un tag <a>, posso usare uno span per text? -->
                <span class="icon fa-light fa-house"></span>
                <a href="home.php">Feed</a>
            </li>
            <li>
                <span class="icon fa-regular fa-magnifying-glass"></span>
                <a href="#">Search</a>
            </li>
            <li>
                <span class="icon fa-solid fa-heart"></span>
                <a href="#">Notifications</a>
            </li>
            <li>
                <span class="icon fa-regular fa-user"></span>
                <a href="#">Profile</a>
            </li>
            <li>
                <span class="icon fa-light fa-sliders"></span>
                <a href="settings.php">Settings</a>
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