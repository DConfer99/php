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

echo "<a href=\"login.php\">Login/Logout</a>";
echo "<a href=\"register.php\"> | Register</a>";
echo "<a href=\"upload.php\"> | Upload an Image</a>";
echo "<a href=\"users.php\"> | View Site Users<a/>";
echo "<hr />";

//bring in database connection
require('dbconnection.php');

//if delete button is pressed
if (isset($_POST['id']) && isset($_POST['delete'])){
  $sql = "DELETE from users where user_id =" . $_POST['id'];
  $result = $conn->query($sql);
}

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
         <th>Actions</th>
       </tr>

       <?php
       // PHP loop generates rows based on databses contents
          while($row = $result->fetch_assoc()){
            echo "<tr>";
              echo "<td>" . $row['user_id'] . "</td>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['password'] . "</td>";
              echo "<td>
                        <form action = \"edituser.php\" method = \"get\">
                          <input type =\"hidden\" name= \"id\" value=\"" . $row['user_id'] . "\">
                          <input type = \"submit\" value = \"Edit\" name =\"edit\">
                        </form>
                   </td>";

              echo "<td>
                          <form action=\"\" method=\"post\">
                            <input name=\"id\" type=\"hidden\" value=\"" . $row['user_id'] . "\">
                            <input type=\"submit\" value=\"Delete\" name=\"delete\">
                          </form>
                    </td>";
            echo "</tr>";
          }

        ?>

     </table>
     <br />
     <hr />
    <?php
    echo "Logged in as: " . $_SESSION['username'];
    ?>
   </body>
 </html>
