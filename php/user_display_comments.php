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

$sql = "SELECT poem_id, comment FROM Comments WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $poem_id = $row['poem_id'];
        $comment = $row['comment'];

        $sql1 = "SELECT title FROM Posts WHERE poem_id = '$poem_id'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                echo "
                <div id='box'>
                    <div id='content'>
                        <p>Commented on: </p>
                        <h4>" . $row['title'] . "</h4>
                        <p>" . nl2br($comment) . "</p>
                        <a class='button' href='../../php/delete_comment.php?poem_id=" . $poem_id . "'>Delete Poem</a>
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