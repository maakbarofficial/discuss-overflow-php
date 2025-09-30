<nav>
    <div>
        <a href="#">
            <img src="./public/logo.png" alt="logo" width="200">
        </a>
        <div>
            <div>
                <a href="/doapp">Home</a>
                <a href="?questions=true">Questions</a>
                <a href="?ask=true">Ask a Question</a>
                <a href="?category=true">Catagory</a>

                <?php if (!isset($_SESSION["user"])) { ?>
                    <a href="?login=true">Login</a>
                    <a href="?signup=true">SignUp</a>
                <?php } else { ?>
                    <form method="GET" action="<?php echo $baseUrl ?>server/requests.php" style="display: inline;">
                        <button type="submit" name="logout">Logout</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>