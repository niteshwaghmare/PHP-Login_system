<?php
$user = "root";
$pass = "root";
try {
  $dbh = new PDO('mysql:host=localhost;dbname=systemlogin', $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print " Error!: " . $e->getMessage() . "<br/>";
     die();
}
 ?>
