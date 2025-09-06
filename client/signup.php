<div>
    <div>
        <div>
            <div>
                <h3>Sign Up</h3>
            </div>
            <div>
                <form method="POST" action="<?php echo $baseUrl ?>server/requests.php">
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>

                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <div>
                        <label for="role">Role</label>
                        <select name="role" required>
                            <option selected>Select role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="demo">Demo</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" name="signup">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>