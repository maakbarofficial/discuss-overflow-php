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
    <?php include($basePath . 'client/header.php'); ?>

    <?php
    if (isset($_GET['signup'])) {
        include($basePath . 'client/signup.php');
    } else if (isset($_GET['login'])) {
        include($basePath . 'client/login.php');
    } else {
        echo "<h2>Welcome to Discuss OverFlow!</h2>";
    }
    ?>
</body>

</html>