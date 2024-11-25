<!DOCTYPE html>
<html>
<head>
  <title>Poemsy</title>
  <link rel="stylesheet" href="http://localhost/Poemsy/css/loss_Style.css">
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
      <li><a href="http://localhost/Poemsy/html/d_romance.php">Romance</a></li>
      <li><a href="http://localhost/Poemsy/html/d_war.php">War</a></li>
      <li><a href="http://localhost/Poemsy/html/d_fame.php">Fame</a></li>
      <li><a href="http://localhost/Poemsy/html/d_parenthood.php">Parenthood</a></li>
      <li><a href="http://localhost/Poemsy/html/d_loss.php">Loss</a></li>
    </ul>
  </nav>

  <div id="body_container">
    <h1>
      This is the Loss poetry section
    </h1>
    <?php include('../php/loss.php'); ?>
  </div>
  

</body>

</html>