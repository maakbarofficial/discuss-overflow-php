<?php

include __DIR__ . '/../db/db.php';

if(isset($_POST['signup'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  echo 'Username is '. $username;
}

?>