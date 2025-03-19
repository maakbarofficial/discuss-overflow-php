<!DOCTYPE html>
<html lang="en">

<head>
    <title>Discuss OverFlow</title>
    <?php include('./client/common.php') ?>
</head>

<body>
    <?php include('./client/header.php') ?>

    <?php
    if (isset($_GET['signup'])) {
        include('./client/signup.php');
    } else if (isset($_GET['login'])) {
        include('./client/login.php');
    } else {
    }
    ?>
</body>

</html>