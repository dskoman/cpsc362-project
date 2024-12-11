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

$sql = "SELECT poem_id, title, content FROM Posts WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <div id='box'>
            <div id='content'> 
                <h2>" . $row['title'] . "</h2> 
                <p>" . nl2br($row['content']) . "</p>
                <a class='button' href='../../php/delete_poem.php?poem_id=" . $row['poem_id'] . "'>Delete Poem</a>
            </div>
        </div>";
    } 
} else {
    echo "<p>No Poems Posted.</p>";
}

// Close the database connection
$conn->close();

?>