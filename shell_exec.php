<?php
$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";

$pwd = shell_exec('pwd');
echo "<pre>$pwd</pre>";

$identity = shell_exec('whoami');
echo "<pre>$identity</pre>";

?>
