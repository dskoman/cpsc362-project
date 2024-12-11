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
$sql3 = "DELETE FROM Likes WHERE user_id = '$user_id'";
$sql4 = "DELETE FROM Comments WHERE user_id = '$user_id'";
$sql2 = "DELETE FROM Posts WHERE user_id = '$user_id'";
$sql1 = "DELETE FROM Users WHERE user_id = '$user_id'";

if($conn->query($sql3) == TRUE) {
  //echo "User's likes successfully deleted";
} else {
  echo "Error:" . $sql3 . "<br>" . $conn->error;
}

if($conn->query($sql4) == TRUE) {
  //echo "User's comments successfully deleted"; 
} else {
  echo "Error:" . $sql4 . "<br>" . $conn->error;
}

if($conn->query($sql2) == TRUE) {
  //echo "User's posts successfully deleted";
} else {
  echo "Error:" . $sql2 . "<br>" . $conn->error;
}

if($conn->query($sql1) == TRUE) {
  header("Location: http://localhost/Poemsy/index.php");
  exit(); 
} else {
  echo "Error:" . $sql1 . "<br>" . $conn->error;
}



exit();
?>