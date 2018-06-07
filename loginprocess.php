<?php
session_start();
ini_set('display_error',on);
require 'db_connect.php';
$email = filter_var(($_POST['email']),FILTER_SANITIZE_EMAIL);
$result = $dbh->query("SELECT * FROM basiclogin WHERE Email = '$email' ");
//
if ($result->rowCount() == 0) { // user doesn't exist
  $_SESSION['message'] = "User with that email doesn't exist!";
  header("location: error.php");
  exit();
} else {
  // User exists
  $user = $result->fetch();
if (password_verify($_POST['password'],$user['Password'])) {
  $_SESSION['name'] = $user['Name'];
  $_SESSION['active'] = $user['Active'];
  $_SESSION['email'] = $user['Email'];
  if ($_SESSION['active'] == 0) {
    $_SESSION['message'] = "Please verify your email address";
  } else{
    $_SESSION['message'] = "Account is verified <br> Now you can get daily updates! ";
  }
  // This is how we'll know the user is logged in
  $_SESSION['logged_in'] = true;
  header("location: profile.php");
  exit();
} else{
  $_SESSION['message'] = "you have entered wrong password!";
  header('location: error.php');
}








}

?>
