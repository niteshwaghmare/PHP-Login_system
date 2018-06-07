<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Thank you!</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
     <div class="thanks" id="box">
       <p class="head">Thank you!</p>
       <div class="notice">
         <p class="message">Log out successfully! <br> Have a nice day!</p>
       </div>
       <a href="http://localhost:8888/" class="">
         <div class="link" id="home" >
         Home
         </div>
       </a>
     </div>
   </body>
 </html>
