<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php
$username = $_POST['username'];
$password = $_POST['password'];
 ?>

  <body>
    <form method="post" action="">
      <input type="text" name="username" placeholder=" Enter Username"><br />
      <input type="password" name="password">
      <br />
      <input type="submit" value="go">
    </form>
    <br />

<?php
if (isset($username) && isset($password)) {
  //echo "Your username was " . $username;
  //echo "<br />";
  //echo "Your password was $password";
  if ($username == "dillon" && $password == "password"){
    $_SESSION['username'] = $username;
  }
}
echo "Logged in as: " . $_SESSION['username'];
?>
  </body>
</html>
