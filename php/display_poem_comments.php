<?php
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

$sql = "SELECT user_id, comment FROM Comments WHERE poem_id = '$poem_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comment = $row['comment'];
        $commenter = $row['user_id'];

        $sql1 = "SELECT username FROM Users WHERE user_id = '$commenter'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                echo "
                    <h4>" . $row['username'] . "</h4>
                    <p>" . nl2br($comment) . "</p>
                ";
            } 
        } 

    }
} else {
    echo "No Liked Poems";
}


// Close the database connection
$conn->close();

?>