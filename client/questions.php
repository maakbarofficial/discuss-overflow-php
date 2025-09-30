<?php
include(__DIR__ . '/../db/db.php');
include(__DIR__ . '/../debug.php');

$query = "
    SELECT q.id, q.title, q.description, q.created_at, q.updated_at,
           c.name AS category_name,
           u.username AS user_name, u.email AS user_email, u.id AS user_id
    FROM questions q
    JOIN categories c ON q.category_id = c.id
    JOIN users u ON q.user_id = u.id
    ORDER BY q.created_at DESC
";
$result = $conn->query($query);

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<thead>
        <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>User</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan='2'>Actions</th>
        </tr>
        </thead>
        <tbody>";
if ($result->num_rows > 0) {
    foreach ($result as $row) {
        $id = $row['id'];
        $user = $_SESSION["user"];
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
        if ($user["id"] == $row["user_id"]) {
            echo "<td><a href='?questionId=$id'><button>Edit</button></a></td>";
            echo "<td>" . "<button>Delete</button>" . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<h1>No Questions Available</h1>";
}
