<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo 'Hello ' . $_SESSION['name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="profile" id="box">
      <p class="head">Hello <?php echo $_SESSION['name']; ?></p>
      <div class="notice">
        <p class="message"><?php echo $_SESSION['message']; ?></p>
      </div>
      <a href="http://localhost:8888/logout.php" class="">
        <div class="link" id="logout">
        Log out
        </div>
      </a>
    </div>
  </body>
</html>
