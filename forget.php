<?php
  /* Reset your password form, sends reset.php password link */
    require 'db_connect.php';
    session_start();
    // ini_set("display_errors",on);
    // Check if form submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = filter_var(($_POST['email']),FILTER_SANITIZE_EMAIL);
        $result = $dbh->query("SELECT * FROM basiclogin WHERE Email='$email'");
          if($result->rowCount() == 0) {
          // User doesn't exist
          $_SESSION['message'] = "User with that email doesn't exist!";
          header('location: error.php');
          exit();
        } else{
          $user = $result->fetch();

          $email = $user['Email'];
          $hash = $user['Hash'];
          $name = $user['Name'];

          // Session message to display on success.php
          $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
          . " for a confirmation link to complete your password reset!</p>";

          // Send registration confirmation link (reset.php)
          // $to      = $email;
          $to = 'niteshwaghmare@localhost';
          $subject = 'Password Reset Link ( niteshwaghmare.xyz )';
          $message_body = '
          Hello '.$ame.',

          You have requested password reset!

          Please click this link to reset your password:

          http://localhost:8888/reset.php?email='.$email.'&hash='.$hash;

          mail($to, $subject, $message_body);

          header("location: success.php");
          exit();
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forget password!</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <form action="forget.php" method="post" class="forget" id="box">
      <p class="head">Forget Password</p>
      <div class="field">
        <input type="email" class="input" name="email" placeholder="Enter registered email" value="">
      </div>
      <div class="field">
        <button type="submit" class="button-submit" name="forget">Submit</button>
      </div>
    </form>
  </body>
</html>
