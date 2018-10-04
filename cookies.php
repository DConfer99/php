<?php
$cookie_name = "user";
$cookie_value = "bob";
// 86400 is number of secinds in a day
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
        if (isset($_COOKIE['user']){
            // echo "You have been here before!";
        }
        else {
            // echo "This is your first time here!";
            // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }
      ?>
   </body>
 </html>
