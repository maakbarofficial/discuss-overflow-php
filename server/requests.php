<?php
session_start();
include __DIR__ . '/../db/db.php';
include __DIR__ . '/../debug.php';

if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $role = $_POST['role'];

  $query = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`, `role`) VALUES (?, ?, ?, ?)");
  $query->bind_param("ssss", $username, $email, $password, $role);
  $success = $query->execute();

  if ($success) {
    echo '<script>alert("User registered successfully")</script>';
    $id = $conn->insert_id;
    $_SESSION['user'] = ["id" => $id ,"username" => $username, "email" => $email, "role" => $role];
    header("Location: /doapp");
    exit();
  } else {
    echo '<script>alert("Error while creating a user")</script>';
  }
} else if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    echo '<script>alert("Username and password are required")</script>';
  } else {
    $query = $conn->prepare("SELECT `id`, `username`, `email`, `password`, `role` FROM `users` WHERE `username` = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();

      if (password_verify($password, $user['password'])) {
        echo '<script>alert("User logged in successfully")</script>';
        $_SESSION['user'] = [
          "id" => $user['id'],
          "username" => $user['username'],
          "email" => $user['email'],
          "role" => $user['role']
        ];
        header("Location: /doapp");
        exit();
      } else {
        echo '<script>alert("Invalid username or password")</script>';
      }
    } else {
      echo '<script>alert("Invalid username or password")</script>';
    }
  }
} else if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("Location: /doapp");
  exit();
} else if (isset($_POST['ask'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category_id = $_POST['category'];
  $user_id = $_SESSION['user']['id'];

  $query = $conn->prepare("INSERT INTO `questions` (`title`, `description`, `category_id`, `user_id`) VALUES (?, ?, ?, ?)");
  $query->bind_param("ssii", $title, $description, $category_id, $user_id);
  $success = $query->execute();

  if ($success) {
    echo '<script>alert("Question added successfully")</script>';
    header("Location: /doapp");
    exit();
  } else {
    echo '<script>alert("Error while adding a question")</script>';
  }
}
