<?php
// Setting up the Database Connection
$db_host = 'localhost'; //database is installed on PHP server
$db_user = 'dillon'; //name to log into Database
$db_password = 'southhills#'; //password
$db_name = 'dillon'; //databse name in mysql
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
  die("Connection failed, you dingus: " . $conn->connect_error);
}
else{
  "It works!"
}
 ?>
