<!DOCTYPE html>
<html>
<head>
  <title>Poemsy</title>
  <link rel="stylesheet" href="http://localhost/Poemsy/css/user_homescreen_Style.css">
  <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/OIP.JHHVnm0OVXv3WG2IAClEBQHaHa?w=193&h=193&c=7&r=0&o=5&pid=1.7">
  <meta charset="UTF-8">
</head>

<body>
  <div id="first_section">
    <h1 id = "title">Poemsy</h1>
    <button class="log_in"><a href="http://localhost/Poemsy/index.html">Log Out</a></button>
  </div>

  <div id="second_section">
    <div id="sidebar_section">
      <div id="sidebar_icon">☰</div>
          <ul class = "sidebar_list">
            <li><a href="http://localhost/Poemsy/html/user_pages/user_profile.php">My Profile</a></li>
            <li>My Poems</li>
            <li>Liked Poems</li>
            <li>Comment History</li>
          </ul>
    </div>

    <button id="post"><a href="http://localhost/Poemsy/html/user_pages/make_post.html">Post</a></button>

  </div>


  <div id="image"></div>

  <nav>
    <ul  class="navigation_bar">
      <li><a href="http://localhost/Poemsy/html/user_pages/u_romance.php">Romance</a></li>
      <li><a href="http://localhost/Poemsy/html/user_pages/u_war.php">War</a></li>
      <li><a href="http://localhost/Poemsy/html/user_pages/u_fame.php">Fame</a></li>
      <li><a href="http://localhost/Poemsy/html/user_pages/u_parenthood.php">Parenthood</a></li>
      <li><a href="http://localhost/Poemsy/html/user_pages/u_loss.php">Loss</a></li>
    </ul>
  </nav>

  <div id="body_container">
    <h1>
      This is the Loss poetry section
    </h1>
    <?php include('../../php/loss.php'); ?>
  </div>
  
</body>

</html>