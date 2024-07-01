<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $templateParams['title']; ?>
    </title>
    <!-- css -->
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="resources/favicon.ico">

    <!-- navbar icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">

    <?php
    if(isset($templateParams["jsFile"])):
        foreach($templateParams["jsFile"] as $script):
    ?>
        <script src="js/<?php echo $script; ?>" defer></script>
    <?php
        endforeach;
    endif;
    ?>
</head>

<body>
    <?php if (isset($templateParams["navbar"]) && $templateParams["navbar"]) : ?> <!-- if navbar is set and true then "print"-->
        <nav>
            <ul>
                <li>
                    <a href="home.php">
                        <span class="icon fa-regular fa-house"></span>
                        <span class="nav-text">Feed</span>
                    </a>
                </li>
                <li>
                    <a href="search.php">
                        <span class="icon fa-regular fa-magnifying-glass"></span>
                        <span class="nav-text">Search</span>
                    </a>
                </li>
                <li>
                    <a href="newPost.php">
                        <!-- <span class="icon fa-solid fa-plus"></span> -->
                        <span class="icon fa-regular fa-feather"></span>
                        <span class="nav-text">New Post</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <span class="icon fa-regular fa-user"></span>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
                        <span class="icon fa-regular fa-bell"></span>
                        <span class="nav-text">Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon fa-solid fa-arrow-right-from-bracket"></span>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
    <?php if (isset($templateParams["navbar"]) && !$templateParams["navbar"]) : ?>
        <div class="spacer"></div>
    <?php endif; ?>
    <main>
        <?php
        if (isset($templateParams['fileName'])) {
            require_once $templateParams['fileName'];
        }
        ?>
    </main>
</body>

</html>