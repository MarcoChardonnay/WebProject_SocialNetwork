<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <!-- favicon -->
    <title>
        <?php echo $templateParams['title']; ?>
    </title>
</head>

<body>
    <nav></nav>
    <main>
        <?php
        if (isset($templateParams['fileName'])) {
            require_once $templateParams['fileName'];
        }
        ?>
    </main>
</body>

</html>