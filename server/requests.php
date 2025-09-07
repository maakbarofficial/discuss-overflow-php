<?php
session_start();
include __DIR__ . '/../db/db.php';

if (isset($_POST['signup'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $regitser = $conn->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES (NULL, '$username', '$email', '$password', '$role')");
  $user = $regitser->execute();

  if ($user) {
    echo '<script>alert("User registered successfully")</script>';
    $_SESSION['user'] = ["username" => $username, "email" => $email, "role" => $role];
    header("location: /doapp");
  } else {
    echo '<script>alert("Error while creating a user")</script>';
  }
}
