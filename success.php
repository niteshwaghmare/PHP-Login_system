<?php
  session_start();
  ini_set("display_errors",on);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Successfully!</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="success" id="box">
      <p class="head">Successfully</p>
      <div class="notice">
        <p class="message"> <?php echo $_SESSION['message']; ?></p>
      </div>
      <a href="http://localhost:8888/login.php" class="">
        <div class="link" id="home">
        Login
        </div>
      </a>
    </div>
  </body>
</html>
