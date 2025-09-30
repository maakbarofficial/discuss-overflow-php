<select name="category" required>
    <option value="">Select category</option>
    <?php
    include(__DIR__ . '/../db/db.php');

    // If $selectedCategory is set from parent, use it
    $selected = isset($selectedCategory) ? $selectedCategory : null;

    $query = "SELECT * FROM categories";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $id = $row['id'];
            $name = ucfirst($row['name']);
            $isSelected = ($id == $selected) ? "selected" : "";
            echo "<option value='$id' $isSelected>$name</option>";
        }
    }
    ?>
</select>