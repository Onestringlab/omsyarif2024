<?php
// Mencoba menjalankan dump-autoload via shell_exec
$output = shell_exec('composer dump-autoload 2>&1');
echo "<pre>$output</pre>";
?>