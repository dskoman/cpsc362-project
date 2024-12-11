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

$sql = "SELECT poem_id FROM Likes WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $poem_id = $row['poem_id'];

        $sql1 = "SELECT title, content FROM Posts WHERE poem_id = '$poem_id'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                echo "
                <div id='box'>
                    <div id='content'> 
                        <h2>" . $row['title'] . "</h2>
                        <p>" . nl2br($row['content']) . "</p> 
                        <a class='button' href='../../php/unlike.php?poem_id=" . $poem_id . "'>Unlike</a>
                    </div>
                </div>";
            } 
        } 

    }
} else {
    echo "No Liked Poems";
}


// Close the database connection
$conn->close();

?>