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
  //check to see if uploads folder file_exists
  // if uploads folder does not exist, create it
  //file_exists works with files and directories

   if (!file_exists("uploads"){
     mkdir("uploads");
   }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);

  $uploadVerification = true;

  //checks to see if file already exists, all variables are global- $ret works everywhere
  if(file_exists($target_file)){
    $uploadVerification = false;
    $ret = "Sorry, file already exists.";
  }

  //checks file for types
$file_type = $_FILES['upload']['type'];
switch($file_type){
  case "image/jpeg":
    $uploadVerification = true;
  break;

  case "image/png":
    $uploadVerification = true;
  break;

  case "image/gif":
    $uploadVerification = true;
  break;

  case "image/pdf":
    $uploadVerification = true;
  break;

  default:
    $uploadVerification = false;
    $ret = "Sorry file must be .jpeg, .png, .gif, and .pdf files are allowed.";
}


//limits file size to 1MB
  if($_FILES['upload']['size'] > 1000000){
    $uploadVerification = false;
    $ret = "Sorry, file is too big.";
  }

  if ($uploadVerification){
    move_uploaded_file($_FILES['upload']['tmp_name'], $target_file);
  }
}
 ?>

 Upload your file:
 <form action="" method="post" enctype="multipart/form-data"> <!--need enctype for uploading files-->
   <input type="file" name="upload">
   <br />
   <input type="submit">
 </form>

 <h5 style="color:red;">
   <?php if ($ret){echo $ret;} ?>
 </h5>
