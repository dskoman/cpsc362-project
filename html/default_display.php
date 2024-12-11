<!DOCTYPE html>
<html>
<head>
  <title>Poemsy</title>
  <link rel="stylesheet" href="http://localhost/Poemsy/css/default_homescreen_Style.css">
</head>

<body>
  <div id="first_section">
    <h1 id = "title">Poemsy</h1>

    <div class = "button_container">
      <button class="log_in"><a href="log_in.html">Log In</a></button>
    
      <button class="register"><a href="register.html">Register</a></button>
    </div>
  </div>

  <div id="image"></div>
  
  <nav>
  <ul  class="navigation_bar">
  <?php 
      echo"
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Romance'>Romance</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=War'>War</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Fame'>Fame</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Parenthood'>Parenthood</a></li>
      <li><a href='http://localhost/Poemsy/html/default_display.php?category=Loss'>Loss</a></li>";
  ?>
    </ul>
  </nav>

  <div id="section_title">
    <?php 
      $category = $_GET['category'];
      echo "<h1>This is the " . $category .  " poetry section </h1>";
    ?>
  </div>

  <div id="body_container">
    <?php 
    include('../php/default_display_poems.php'); 
    ?>
  </div>
  

</body>

</html>