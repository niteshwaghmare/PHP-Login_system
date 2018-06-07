<?php
session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Error!</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
     <div class="error" id="box">
       <p class="head">You have got an Error!</p>
       <div class="notice">
         <p class="message"><?php echo $_SESSION['message']; ?></p>

       </div>
       <a href="http://localhost:8888/">
         <div class="link" id="home">
           Back to home
         </div>
       </a>
     </div>
   </body>
 </html>
