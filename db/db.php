<?php
require_once __DIR__ . '/../debug.php';

$host = "localhost";
$root = "root";
$password = null;
$database = "doapp";

$conn = new mysqli($host, $root, $password, $database);

if($conn->connect_error){
  die("Database connection error" . $conn->connect_error);
}

// echo "Databse connected";
?>