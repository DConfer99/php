<?php
if (!isset($_SESSION)){
  session_start();
}

if (!isset($_SESSION['username'])){
  //die("DONTCHU DO IT.");
  header("Location: login.php");
}

var_dump($_POST['upload']);
echo "<hr />";
var_dump($_FILES['upload']);
echo "<hr />";

if (isset($_FILES['upload'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);
  move_uploaded_files($_FILES['upload']['temp_name'], $target_file);
}
 ?>

 Upload your file:
 <form action="" method="post" enctype="multipart/form-data"> //need enctype for uploading files
   <input type="file" name="upload"
   <br />
   <input type="submit">
 </form>
