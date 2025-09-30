<?php
include(__DIR__ . '/../db/db.php');
include(__DIR__ . '/../debug.php');

$id = intval($_GET['questionId']);
$stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$question = $result->fetch_assoc();
?>

<div>
    <h3>Edit Question</h3>
    <form method="POST" action="<?php echo $baseUrl ?>server/requests.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($question['id']); ?>">

        <div>
            <label for="title">Title</label>
            <input type="text" name="title"
                value="<?php echo htmlspecialchars($question['title']); ?>"
                placeholder="Enter question title" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" rows="5" required><?php echo htmlspecialchars($question['description']); ?></textarea>
        </div>

        <div>
            <label for="category">Category</label>
            <?php
            $selectedCategory = $question['category_id'];
            include("categories.php");
            ?>
        </div>

        <div>
            <button type="submit" name="update_question">Update Question</button>
        </div>
    </form>
</div>