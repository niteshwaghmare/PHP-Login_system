<?php
session_start();
  /*
  Registeration process inserts user info database
  and sends account confirmation email message
  */

require 'db_connect.php';

// Set session variable to be used on profile.php

$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['contact'] = $_POST['contact'];

// Escape all $_POST variables to protect against SQL injections
$name = filter_var(($_POST['name']),FILTER_SANITIZE_STRING);
$email = filter_var(($_POST['email']),FILTER_SANITIZE_EMAIL);
$contact = intval($_POST['contact']);
$password= password_hash($_POST['password'],PASSWORD_BCRYPT);
$hash = (md5(rand(0,1000)));


// Check if user with that email already exists
$result= $dbh->query("SELECT * FROM basiclogin WHERE email='$email'") or die($dbh->error());

// We know user email exists if the returned are more than 0
if($result->rowCount() > 0) {
  $_SESSION['message'] = "User with $email email already exists!";
  header("location: error.php");
} else{

  // Email doesn't exists
  // active is 0 by DEFAULT (no need to include it hear)
  $sql = "INSERT INTO basiclogin (Name , Email , Password , Hash , Contact)" .  "VALUES ('$name','$email','$password','$hash','$contact')";

  if($dbh->query($sql))
  {
    $_SESSION['active']= 0;  // 0 until user activates their account with verify.php
    $_SESSION['logged_in'] = true;
    $_SESSION['message'] = "Confirmation link has been sent to $email , please verify
                your account by clicking on the link in the message!";

    // Send registration confirmation link (verify.php)

    // $to = $email;
    $to = 'niteshwaghmare@localhost';  // for test purpose mail will be send to localhost
    $subject ='Account Verification (niteshwaghmare.xyz)';
    $message_body='Hello ' . $name . ',

    Thank you for signing up!

    Please clink this link to activate your account:

    http://localhost:8888/verify.php?email='.$email.'&hash='.$hash;

    mail($to,$subject,$message_body);

    header("location: profile.php");
    exit();
  } else {
    $_SESSION['message'] = 'Registration failed !';
    header('location: error.php');
    exit();
  }
}


?>
