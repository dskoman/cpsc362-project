<?php
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
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the user data into the database
$sql = "INSERT INTO Users (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password')";

if($conn->query($sql) == TRUE) {
  //echo "New user successfully registered";
  header("Location: http://localhost/Poemsy/html/log_in.html");
  exit(); 
} else {
  echo "Error:" .$sql . "<br>" . $conn->error;
}

}

// Close the database connection
$conn->close();

?>