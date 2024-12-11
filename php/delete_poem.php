<?php
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
$sql3 = "DELETE FROM Likes WHERE poem_id = '$poem_id'";
$sql4 = "DELETE FROM Comments WHERE poem_id = '$poem_id'";
$sql2 = "DELETE FROM Posts WHERE poem_id = '$poem_id'";

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
  //header("Location: http://localhost/Poemsy/index.php");
  header("Location: " . $_SERVER['HTTP_REFERER']);
  exit(); 
} else {
  echo "Error:" . $sql1 . "<br>" . $conn->error;
}



exit();
?>