<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Poemsy</title>
  <link rel="stylesheet" href="http://localhost/Poemsy/css/profile.css">
  <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/OIP.JHHVnm0OVXv3WG2IAClEBQHaHa?w=193&h=193&c=7&r=0&o=5&pid=1.7">
  <meta charset="UTF-8">
</head>

<body>
  <div id="profile_container">
    <h1>Profile Information</h1>

    <h2>First Name: </h2>
    <h3><?= $_SESSION['first_name'] ?></h3>

    <h2>Last Name: </h2>
    <h3><?= $_SESSION['last_name'] ?></h3>

    <h2>UserName: </h2>
    <h3><?= $_SESSION['username'] ?></h3>

    <h2>Email: </h2>
    <h3><?= $_SESSION['email'] ?></h3>

    <form action="http://localhost/Poemsy/php/delete_user.php" method="POST">
      <button class="delete_button" type="submit">Delete Account</button>
    </form>

  </div> 
</body>

</html>