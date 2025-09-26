<?php
include(__DIR__ . '/../db/db.php');
include(__DIR__ . '/../debug.php');

$query = "SELECT * FROM categories";
$result = $conn->query($query);
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan='2'>Actions</th>
        </tr>
        </thead>
        <tbody>";
if ($result->num_rows > 0) {
    foreach ($result as $row) {
        $id = $row['id'];
        $name = ucfirst($row['name']);
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
        echo "<td>" . "<button>Edit</button>" . "</td>";
        echo "<td>" . "<button>Delete</button>" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<h1>No Categories Available</h1>";
}
