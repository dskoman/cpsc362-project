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

if (isset($_GET['poem_id'])){
    $poem_id = $_GET["poem_id"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    $sql = "INSERT INTO Comments (comment, user_id, poem_id) VALUES ('$comment','$user_id', '$poem_id')";

    if($conn->query($sql) == TRUE) {
        //echo "Comment sucessful";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Failed to comment";
        echo "Error:" .$sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

?>