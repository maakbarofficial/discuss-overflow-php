<div>
    <div>
        <div>
            <div>
                <h3>Ask a Question</h3>
            </div>
            <div>
                <form method="POST" action="<?php echo $baseUrl ?>server/requests.php">

                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Enter question title" required>
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" rows="5" placeholder="Enter question details" required></textarea>
                    </div>

                    <div>
                        <label for="category">Category</label>
                        <?php include("categories.php"); ?>
                    </div>

                    <div>
                        <button type="submit" name="ask">Submit Question</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>