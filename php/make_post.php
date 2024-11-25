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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturing and sanitizing user inputs
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Insert the data into the database
    $sql = "INSERT INTO Posts (title, category, content, user_id) VALUES ('$title', '$category', '$content', '$user_id')";

    if($conn->query($sql) == TRUE) {
        //echo "New post successfully made";
        header("Location: http://localhost/Poemsy/html/user_homescreen.html");
        exit(); 
      } else {
        echo "Error:" .$sql . "<br>" . $conn->error;
      }
}

// Close the database connection
$conn->close();

?>