<?php
session_start();
require('dbconnection.php'); //connects to db, loads in all data from dbconnection
if (isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT username, password FROM users where username = '$username'"; //sql statement to execute
  $result=$conn->query($sql); //execute sql and store result as array

  //extracting query infornamtion, pulls out one by one, stores in row
  while ($row = $result->fetch_assoc()){
    if ($username == $row['username'] && password_verify($password, $row['password']) ){
      $_SESSION['username'] = $username;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php
if (isset($_POST['logout'])){
  unset($_SESSION['username']);
}
 ?>

  <body>

    <a href="register.php">Register Here</a>
    <?php
    if (isset($_SESSION['username'])){
    
    }
     ?>

    <form method="post" action="">
      <input type="text" name="username" placeholder=" Enter Username"><br />
      <input type="password" name="password">
      <br />
      <input type="submit" value="Login"><br />
      <input type="submit" name="logout" value="Logout">
    </form>
    <br />

<?php
echo "Logged in as: " . $_SESSION['username'];
 ?>
  </body>
</html>
