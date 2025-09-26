<?php
include(__DIR__ . '/../db/db.php');
include(__DIR__ . '/../debug.php');

$query = "SELECT 
            q.id, q.title, q.description, q.created_at, q.updated_at,
            c.id AS category_id, c.name AS category_name,
            u.id AS user_id, u.username AS user_name
          FROM questions q
          JOIN categories c ON q.category_id = c.id
          JOIN users u ON q.user_id = u.id";

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
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
            </tr>
          </thead>
          <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category_name']) . " (" . htmlspecialchars($row['category_id']) . ")</td>";
        echo "<td>" . htmlspecialchars($row['user_name']) . " (" . htmlspecialchars($row['user_id']) . ")</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No questions found.";
}
