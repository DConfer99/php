<?php
// $output = shell_exec('ls -lart');
// echo "<pre>$output</pre>";
//
// $pwd = shell_exec('pwd');
// echo "<pre>$pwd</pre>";
//
// $identity = shell_exec('whoami');
// echo "<pre>$identity</pre>";

$file_test = file_exists("test");
if ($file_test){
  echo "Directory exists!";
  echo "<br />";
  echo "Here's what's in it: ";
  echo "<br />";
  $testArray = scandir("test/");
  var_dump($testArray);
}else{
  echo "Directory doesn't exist!";
}
?>
