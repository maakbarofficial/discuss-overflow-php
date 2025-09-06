<?php

include __DIR__ . '/../db/db.php';

if(isset($_POST['signup'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $regitser = $conn->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES (NULL, '$username', '$email', '$password', '$role')");
  $user = $regitser->execute();
  
  if($user){
    echo 'User registered succesfully';
  } else {
    echo "Error while creating a user";
  }
}

?>