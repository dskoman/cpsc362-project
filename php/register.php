<?php
$servername = "localhost";
$username = "root";
$password = "your_db_password";
$database_name = "poemsy";
$location = "home.php";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database_name);


// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully to the database!";

session_start();

function redirect_to($location) {

  header("Location: " . $location);
  exit;
}





if (isset($_SESSION['email'])) {
  redirect_to("home.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Capture and sanitize user inputs

    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the user data into the database
    $sql = "INSERT INTO Users (first_name, last_name, email, username, user_password) VALUES ('$first_name', '$last_name', '$email', '$username', '$hashed_password')";

if (mysqli_query($db, $sql)) {
    echo "User registered successfully!";
    // Optionally, redirect the user after successful registration
    // redirect_to("login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

// Close the database connection
mysqli_close($db);
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Poemsy</title>
<link rel="stylesheet" href="register_Style.css">
</head>

<body>
<div id="register_container">
  <form method="POST" action="register.php">
    <h2>Register</h2>
    <h3>Enter First Name: </h3>
    <input type = text id="first_name" name ="first_name" required>
    <h3>Enter Last Name: </h3>
    <input type = text id="last_name" name = "last_name" required>
    <h3>Enter Email: </h3>
    <input type = text id="email" name = "email"  required>
    <h3>Enter Username: </h3>
    <input type = text id="username"  name = "username" required>
    <h3>Create Password: </h3>
    <input type = text id="user_password"  name = "user_password" required>
    <br>
    <button class="register_button">Register</button> 
  </form>
</div>
</body>

</html>