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
  //var_dump($testArray);
  foreach ($testArray as $fileName => $value) {
    if ($value == "." || $value == ".."){continue;}
    echo $value . "<br />";
  }
}else{
  echo "Directory doesn't exist!";
}

echo "<br />";
echo "<br />";
$users = shell_exec('who');
$usersArray = explode("\n",$users);
foreach ($ussersArray as $key => $value) {
  if ($key = "0" || $key = "1"){continue;}
  $username = substr($value, 0, strpos($value, ' '));
  echo $username . "<br />";
}
// echo $usersArray[0];
// echo "<br />";
// echo "<pre>$users</pre>";
//"aaaaaah"
?>
