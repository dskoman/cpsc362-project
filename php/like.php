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


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $poem_id = $_GET["poem_id"];

    $sql = "SELECT * FROM Likes WHERE user_id = '$user_id' AND poem_id = '$poem_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      header("Location: " . $_SERVER['HTTP_REFERER']);
       exit();
    } else {
      // Insert the data into the database
    $sql = "INSERT INTO Likes (user_id, poem_id) VALUES ('$user_id', '$poem_id')";

    if($conn->query($sql) == TRUE) {
       header("Location: " . $_SERVER['HTTP_REFERER']);
       exit();
      } else {
        echo "Error:" .$sql . "<br>" . $conn->error;
      }
    }
}

// Close the database connection
$conn->close();

?>