<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "poemsy";
$port = 3307;
$user_name = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name, $port);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT p.poem_id, p.title, p.content, p.user_id ,COUNT(l.poem_id) AS likes_count
FROM Posts p
LEFT JOIN Likes l ON p.poem_id = l.poem_id
GROUP BY p.poem_id
ORDER BY likes_count DESC
LIMIT 5;";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sql1 = "SELECT username FROM Users WHERE user_id = '" . $row['user_id'] . "'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while($temp_row = $result1->fetch_assoc()) {
                $user_name = $temp_row['username'];
            }
        }

        echo "
        <div id='post_container'>
            <h2>" . $row['title'] . "</h2>
            <h4>By " . $user_name . "</h4>
            <p>" . nl2br($row['content']) . "</p>
        </div>
        ";
    } 
} else {
    echo "No poems posted made.";
}

// Close the database connection
$conn->close();

?>