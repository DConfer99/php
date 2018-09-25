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


if (isset($_GET['id']) && $_GET['edit']=="Edit"){
  //bring in database connection
  require('dbconnection.php');

  $sql = "SELECT * from users where user_id=" . $_GET['id'] . ";"; //id is an int datatype, doesn't require quotes
  $result = $conn->query($sql);

echo "<form action=\"\" method=\"post\">";
            while ($row = $result->fetch_assoc()){
               echo "<input name=\"userid\" type =\"text\" disabled value=\"" . $row['user_id'] . "\">";
               echo "<br />";
               echo "<input name=\"username\" type =\"text\" value=\"" . $row['username'] . "\">";
              echo "<br />";
            //   echo "<input name=\"password\" type =\"text\" disabled value=\"" . $row['userid'] . "\">";
              echo "<br />";
            //   echo "<input name=\"submit\" type=\"submit\" value=\"Change\">;
             }
            // echo "</form>";
} else {

  echo "You should not be here.";
}

?>
