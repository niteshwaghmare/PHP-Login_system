<?php
  // Reset password process
  session_start();
  require 'db_connect.php';
  ini_set('display_errors',on);
  // Check wheather email or hash not empty
  if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) ) {

    $email = filter_var(($_GET['email']),FILTER_SANITIZE_EMAIL);
    $hash = $_GET['hash'];

    $result = $dbh->query("SELECT * FROM basiclogin WHERE Email='$email'");
    if($result->rowCount() == 0)
    {
      $_SESSION['message'] ="No user registed with this address";
      header('location: error.php');
      exit();
    } else{
      $user = $result->fetch();
      if ($hash == $user['Hash']) {
            header("location: resetpassword.php?id=$hash&email=$email");
      } else{
        $_SESSION['message'] ="No user registed with this address";
        header('location: error.php');
        exit();
      }
    }
  }

 ?>
