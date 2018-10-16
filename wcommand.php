<?php
echo "Here is a list of who is currently logged into the 23.30.218.171 server:";

//execute w command, returns string
$wRawOutput = shell_exec('w');
echo $wRawOutput;
 ?>
