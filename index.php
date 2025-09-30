<?php
include('./config.php');
include('./rate_limiter.php');

// Enforce rate limit: 100 requests per hour
rateLimiter(100, 3600);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Discuss OverFlow</title>
    <?php include($basePath . 'client/common.php'); ?>
</head>

<body>
    <?php
    session_start();
    include($basePath . 'client/header.php');
    ?>

    <?php
    if (isset($_GET['signup']) && empty($_SESSION["user"])) {
        include($basePath . 'client/signup.php');
    } else if (isset($_GET['login']) && empty($_SESSION["user"])) {
        include($basePath . 'client/login.php');
    } else if (isset($_GET['questions']) && isset($_SESSION["user"])) {
        include($basePath . 'client/questions.php');
    } else if (isset($_GET['ask']) && isset($_SESSION["user"])) {
        include($basePath . 'client/ask.php');
    } else if (isset($_GET['category']) && isset($_SESSION["user"])) {
        include($basePath . 'client/category.php');
    } else {
        include($basePath . 'client/home.php');
    }
    ?>
</body>

</html>