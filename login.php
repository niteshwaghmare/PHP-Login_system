<?php
//  User login process, checks if user exists ans password is correct

  // if ($_SERVER['REQUEST_METHOD'] == 'POST')
  // {
  //     if (isset($_POST['login'])) { //user logging in
  //       require 'loginprocess.php';
  //     }
  // }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome back!</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <form class="login" action="loginprocess.php" method="post"  id="box">
      <p class="head">Welcome Back!</p>
      <div class="field">
        <input type="email" class="input" name="email" placeholder="Email*" value="">
      </div>
      <div class="field">
        <input type="password" class="input" name="password" placeholder="Password*" value="">
      </div>

      <div class="field">
        <a class="link1" href="index.php">Don't have an account?</a><br><br>
        <a class="link1" href="forget.php">Forget password? </a>
        <button type="submit" class="button-submit" name="login">Sign In</button>
      </div>
    </form>
  </body>
</html>
