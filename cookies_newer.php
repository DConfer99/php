<?php
//sets time zone for page
date_default_timezone_set("America/New_York");

//set cookie for the date and time the site was visited last
$cookie_name = "lastVisitDateTime";
$cookie_value = mktime();
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
     if(isset($_COOKIE['lastVisitDateTime'])){
       echo "You last visited this page on " . date("F j, Y", $_COOKIE['lastVisitDateTime']) . " at " . date("g:i A", $_COOKIE['lastVisitDateTime']) . ".";
       echo "<br />";

       $currentTime = mktime();
       $secondsPassed = $currentTime - $_COOKIE['lastVisitDateTime'];
       echo "Why, that was a whole " . $secondsPassed . " seconds ago!";
     }
    echo "<br />";
    echo "<br />";
     echo "<img src=\"images/Cookies-PNG-Photos.png\" width=300px>";
      ?>

   </body>
 </html>
