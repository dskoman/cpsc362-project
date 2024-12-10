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
    <form action="http://localhost/Poemsy/php/log_out.php" method="POST">
      <button class="log_out" type="submit">Log Out</button>
    </form>
  </div>

  <div id="second_section">
    <div id="sidebar_section">
      <div id="sidebar_icon">☰</div>
          <ul class = "sidebar_list">
              <li><a href="http://localhost/Poemsy/html/user_pages/user_profile.php">My Profile</a></li>
              <li><a href="http://localhost/Poemsy/html/user_pages/my_poems.php" >My Poems</a></li>
              <li><a href="http://localhost/Poemsy/html/user_pages/liked_poems.php" >Liked Poems</a></li>
              <li><a href="http://localhost/Poemsy/html/user_pages/my_comments.php" >Comment History</a></li>
          </ul>
    </div>

    <button id="post"><a href="http://localhost/Poemsy/html/user_pages/make_post.html">Post</a></button>

  </div>


  <div id="image"></div>

  <nav>
    <ul  class="navigation_bar">
    <?php 
    echo"
      <li><a href='http://localhost/Poemsy/html/user_pages/user_display.php?category=Romance'>Romance</a></li>
      <li><a href='http://localhost/Poemsy/html/user_pages/user_display.php?category=War'>War</a></li>
      <li><a href='http://localhost/Poemsy/html/user_pages/user_display.php?category=Fame'>Fame</a></li>
      <li><a href='http://localhost/Poemsy/html/user_pages/user_display.php?category=Parenthood'>Parenthood</a></li>
      <li><a href='http://localhost/Poemsy/html/user_pages/user_display.php?category=Loss'>Loss</a></li>";
    ?>
    </ul>
  </nav>

  <div id="body_container">
    <h1>Top 5 Most Liked Poems</h1>
    <?php 
    include('../php/user_top5_display.php'); 
    ?>
  </div>
  
</body>

</html>