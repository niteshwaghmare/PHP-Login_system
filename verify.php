<?php

  /*
    Verifies registered user email, the link to this page
    is includeed in the register.php email message
   */
   require 'db_connect.php';
   session_start();
   ini_set("display_errors",on);
   // Make sure email and hash variables aren't empty
   if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {

     $email = filter_var(($_GET['email']),FILTER_SANITIZE_EMAIL);
     $hash = $_GET['hash'];


     $result = $dbh->query("SELECT * FROM basiclogin WHERE Email = '$email' AND Hash= '$hash'");

     if ($result->rowCount() == 0) {
       $_SESSION['message'] = "Account has already been activated or the URL is invalid";
       header("location: error.php");
     }
     else{
       $_SESSION['message'] = "Your account has been activated!";

       // Set the user status to active (active = 1)
       $dbh->query("UPDATE basiclogin SET Active= '1' WHERE Email = '$email' AND Hash = '$hash'");
       header("location: success.php");
       exit();
     }
   }
   else{
     $_SESSION['message'] = "Invalid parameters provided for account verification!";
     header('location: error.php');
     exit();
   }
?>
