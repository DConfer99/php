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

//bring in database connection
require('dbconnection.php');

//create SQL query
$sql = "SELECT * from users;";

//execute SQL query
$result = $conn->query($sql);


//close database connection, will close automatically, but this is better for DB
$conn->close();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <table>
       <tr>
         <th>User ID</th>
         <th>User Name</th>
         <th>Hashed Password</th>
       </tr>

       <?php
       // PHP loop generates rows based on databses contents
          while($row = $result->fetch_assoc()){
            echo "<tr>";
              echo "<td>" . $row['userid'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
          }

        ?>

     </table>
   </body>
 </html>
