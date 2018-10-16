<?php
echo "Here is a list of who is currently logged into the 23.30.218.171 server:";
echo "<br />";

//execute w command, returns string
$wRawOutput = shell_exec('w');
//echo $wRawOutput;

//seperates string based on lines, stores in array
$linesArray = explode("\n",$wRawOutput);
echo $linesArray[2];
 ?>
