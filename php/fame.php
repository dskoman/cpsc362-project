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

$sql = "SELECT title, content FROM Posts WHERE category = 'Fame'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div id='poem'>";
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . nl2br($row['content']) . "</p>";
        echo "</div>";
    } 
} else {
    echo "<p>No posts found in the Fame category.</p>";
}

// Close the database connection
$conn->close();

?>