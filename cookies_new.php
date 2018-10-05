<?php
//set cookie for the date the site was visited last
$cookie_name = "lastVisitDate";
$cookie_value = date("m/d/Y");
setcookie($cookie_name, $cookie_value, time() + (86400 * 30));

//set cookie for the time the site was visited last
$cookie_name = "lastVisitTime";
$cookie_value = date("h:i a");
setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>Welcome to the cookies page!</h1>
     <p>Contrary to popular belief, you won't actually get a REAL cookie.<br />We just really like storing files on your computer.</p>
     <br />
     <?php
        echo "You last visited this page on " . $_COOKIE['lastVisitDate'] . " at " . $_COOKIE['lastVisitTime'];
      ?>
   </body>
 </html>
