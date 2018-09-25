<?php
//check to see if session is started, if not, starts session
if (!isset($_SESSION)){
  session_start();
}

//makes sure user is loggeed in, if not, sends them to login page
if (!isset($_SESSION['username'])){
  //die("DONTCHU DO IT.");
  header("Location: login.php");
}


if (isset($_GET['id']) && $_GET['edit']=="edit"){
  //bring in database connection
  require('dbconnection.php');

  $sql = "SELECT * from users where user_id=" . $_GET['id']; //id is an int datatype, doesn't require quotes
  $result=$conn=>query($sql);

  echo "<form action=\"\" method=\"post\">";
            while ($row = $result->fetch_assoc()){
              echo "<input type =\"text\" disabled value=\"" . $row['userid'] . "\">";
            }

} else{

  echo "You should not be here.";
}

?>
