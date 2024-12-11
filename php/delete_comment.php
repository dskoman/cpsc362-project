<?php
session_start();

$user_id = $_SESSION['user_id'];

//
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "poemsy";
$port = 3307;
$poem_id = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name, $port);

if (isset($_GET['poem_id'])){
    $poem_id = $_GET["poem_id"];
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert the user data into the database
$sql = "DELETE FROM Comments WHERE user_id = '$user_id' AND poem_id = '$poem_id'";

if($conn->query($sql) == TRUE) {
  //echo "User's likes successfully deleted";
  header("Location: " . $_SERVER['HTTP_REFERER']);
  exit();
} else {
  echo "Error:" . $sql . "<br>" . $conn->error;
}



exit();
?>