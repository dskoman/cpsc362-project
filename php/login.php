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

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturing user inputs
    $inputed_username = mysqli_real_escape_string($conn, $_POST['username']);
    $inputed_password = $_POST['password'];

    // Insert the user data into the database
    $sql = "SELECT first_name, last_name, user_id, username, email, password FROM Users WHERE username = '$inputed_username'";
    $result = $conn->query($sql);

    //If the query actually returns something
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $actual_password = $row['password'];

        if(password_verify($inputed_password, $actual_password)) {
            
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            //echo "User succesfully logged in!";
            header("Location: http://localhost/Poemsy/html/user_homescreen.php");
            exit();
        } else {
            echo "Wrong password!";
        }

    } else {
        echo "User does not exist.";
    }
    
    
    }

// Close the database connection
$conn->close();

?>