<?php
// Reset password process
  session_start();
  require 'db_connect.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(($_POST['email']),FILTER_SANITIZE_EMAIL);
    $hash = $_POST['hash'];
    if ($_POST['password'] == $_POST['new_password']) {

      $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

      $query = ("UPDATE basiclogin  SET Password='$new_password' WHERE Hash='$hash'") ;
      if ($dbh->query($query)) {
        $_SESSION['message'] = "Password changed successfully!";
        header('location: success.php');
        echo $new_password;
        exit();
      }
    } else{
      $_SESSION['message'] = "Entered password doesn't match so try agine!";
      header("location: error.php");
      exit();
    }
  }
 ?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="passwordreset" id="box">
      <p class="head">Reset Password</p>
      <form class="" action="resetpassword.php" method="post">
        <div class="field">
          <input type="password" class="input" name="password" placeholder="Password*" value="" required>
        </div>
        <div class="field">
          <input type="password" class="input" name="new_password" placeholder="Password*" value="" required>
        </div>
          <input type="hidden" name="hash" value="<?php echo  $_GET['id']; ?>">
          <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
         <button class="button-submit" type="submit" name="submit">submit</button>
      </form>
    </div>
  </body>
</html>
