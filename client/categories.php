<select name="category" required>
    <option value="">Select category</option>
    <?php
    include(__DIR__ . '/../db/db.php');

    $query = "SELECT * FROM categories";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $id = $row['id'];
            $name = ucfirst($row['name']);
            echo "<option value='$id'>$name</option>";
        }
    }
    ?>
</select>