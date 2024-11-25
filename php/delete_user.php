<?php
session_start();

$user_id = $_SESSION['user_id'];

//
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "poemsy";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name, $port);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert the user data into the database
$sql = "INSERT INTO Users (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password')";

if($conn->query($sql) == TRUE) {
  //echo "New user successfully registered";
  header("Location: http://localhost/Poemsy/html/log_in.html");
  exit(); 
} else {
  echo "Error:" .$sql . "<br>" . $conn->error;
}

header("Location: http://localhost/Poemsy/index.html");
exit();
?>