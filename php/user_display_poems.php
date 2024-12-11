<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "poemsy";
$port = 3307;
$category = "";

if (isset($_GET['category'])){
    $category = $_GET['category'];
}

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name, $port);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, content, poem_id, user_id FROM Posts WHERE category = '$category'";
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
        <div id='box'>
            <div id='content'>
                <h2>" . $row['title'] . "</h2>
                <h4>By " . $user_name . "</h4>
                <p>" . nl2br($row['content']) . "</p>
                <a class='button' href='../../php/like.php?poem_id=" . $row['poem_id'] . "'>Like</a>
                <div id='comment_container'>
                    <form action='http://localhost/Poemsy/php/comment.php?poem_id=" . $row['poem_id'] . "' method = 'POST'>
                        <h4>Comment</h4>
                        <input type=text id='comment' name='comment' required>
                        <button type='submit' class='button'>Comment</button> 
                    </form>
                </div>
            </div>
        </div>";
    } 
} else {
    echo "<p>No posts found in the " . $category . " category.</p>";
}

// Close the database connection
$conn->close();

?>