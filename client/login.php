<div>
    <div>
        <div>
            <div>
                <h3>Login</h3>
            </div>
            <div>
                <form method="POST" action="<?php echo $baseUrl ?>server/requests.php">
                    <div>
                        <label for="username">Username</label>
                        <input type="text" id="username" placeholder="Enter your username" required>
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter your password" required>
                    </div>

                    <div>
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>