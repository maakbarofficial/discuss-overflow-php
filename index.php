<?php
include('./config.php');
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
    } else {
        echo "<h2>Welcome to Discuss OverFlow!</h2>";
    }
    ?>
</body>

</html>