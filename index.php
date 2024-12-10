<!DOCTYPE html>
<html>
<head>
  <title>Poemsy</title>
  <link rel="stylesheet" href="http://localhost/Poemsy/css/default_homescreen_Style.css"> 
  <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/OIP.JHHVnm0OVXv3WG2IAClEBQHaHa?w=193&h=193&c=7&r=0&o=5&pid=1.7">
</head>

<body>
  <div id="first_section">
    <h1 id = "title">Poemsy</h1>

    <div class = "button_container">
      <button class="log_in"><a href="http://localhost/Poemsy/html/log_in.html">Log In</a></button>
    
      <button class="register"><a href="http://localhost/Poemsy/html/register.html">Register</a></button>
    </div>
  </div>

  <div id="image"></div>
  
  <nav>
    <ul  class="navigation_bar">
      <?php 
      echo"<li><a href='http://localhost/Poemsy/html/default_display.php?category=Romance'>Romance</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=War'>War</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Fame'>Fame</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Parenthood'>Parenthood</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Loss'>Loss</a></li>";
      ?>
    </ul>
  </nav>

  <div id="body_container">
    <h1>Top 5 Most Liked Poems</h1>
    <?php 
    include('php/default_top5_display.php'); 
    ?>
  </div>
  
</body>

</html>