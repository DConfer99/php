<?php
echo "Here is a list of who is currently logged into the 23.30.218.171 server:";
echo "<br />";
echo "<br />";

//execute w command, returns string
$wRawOutput = shell_exec('w');
//echo $wRawOutput;

//seperates string based on lines, stores in array
$linesArray = explode("\n",$wRawOutput);
//echo $linesArray[2];

// goes through lines one by one
foreach ($linesArray as $key => $value) {
  //skips first two lines (0 and 1) of gabage info
  if ($key = "0" || $key = "1"){continue;}

//substr() is used to extract username from line
//strpos() finds the first instance of a space in the line and report location- used in substr() to find cutoff
  $userName = substr($value, 0, strpos($value, ' '));

  echo $userName . "<br />";
}
 ?>
