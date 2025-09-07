<nav>
    <div>
        <a href="#">
            <img src="./public/logo.png" alt="logo" width="200">
        </a>
        <div>
            <div>
                <a href="#">Home</a>
                <a href="#">Latest</a>
                <a href="#">Catagory</a>

                <?php if (!isset($_SESSION["user"])) { ?>
                    <a href="?login=true">Login</a>
                    <a href="?signup=true">SignUp</a>
                <?php } else { ?>
                    <a href="?logout=true">Logout</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>