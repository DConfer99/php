<?php

 if (!isset($_SESSION)){
   session_start();
 }

 //won't contact database when page first loads
 //checks if someone has sent post data
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   require('dbconnection.php');

   $username = $_POST['username']; //looks for username in post, potentialy dangerous (XSS, SQL Injection)

   // sanitize username- strips tags
   $username = filter_var($username, FILTER_SANITIZE_STRING);

   // trim any white space
   $username = trim($username); //trims left and right, not in the middle

   //remove slashes, no / allowed
   $username = stripslashes($username);

   //first parameter is string to look for, second is what to replace it with
    $username = str_replace(' ','',$username);

   $password = $_POST['password']; //looks for password in post, password will be hashed, no need to sanitize

   $password = password_hash($password, PASSWORD_BCRYPT); //works with PHP 5.5 and higher
   $sql="INSERT INTO users (username, password) VALUES ('$username', '$password')";
   $conn->query($sql);
 }

 if(isset($_POST['password'])){
   header ("Location: login.php");
 }

 // echo "<a href=\"login.php\">Login/Logout</a>";
 // echo "<a href=\"register.php\"> | Register</a>";
 //
 // if(isset($_SESSION['username'])){
 //   echo "<a href=\"upload.php\"> | Upload an Image</a>";
 //   echo "<a href=\"users.php\"> | View Site Users<a/>";
 // }

require('navbar.php');
 echo "<hr />";
 echo "<br />";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <p>Register Here</p>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Enter Your Username"><br />
      <input type="password" name="password" placeholder="Enter a Password"><br />
      <br />
      <input type="submit">
    </form>

    <br />
    <hr />
    <?php
    if(isset($_SESSION['username'])){
      echo "Logged in as: " . $_SESSION['username'];
    }
    ?>

    </body>
  </body>
</html>
