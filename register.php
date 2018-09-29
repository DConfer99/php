<?php

if(isset($_POST['password'])){
  header ("Location: login.php");
}

 //won't contact database when page first loads
 //checks if someone has sent post data
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   require('dbconnection.php');
   $username = $_POST['username']; //looks for username in post
   $password = $_POST['password']; //looks for password in post
   $password = password_hash($password, PASSWORD_BCRYPT); //works with PHP 5.5 and higher
   $sql="INSERT INTO users (username, password) VALUES ('$username', '$password')";
   $conn->query($sql);
 }



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
      <input type="submit">
    </form>

  </body>
</html>
