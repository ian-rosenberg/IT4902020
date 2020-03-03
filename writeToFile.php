#!/usr/bin/php
<?php

$fp = fopen('SFW_log', 'a');
fwrite($fp, 'Poop'.PHP_EOL);
fwrite($fp, 'meh'.PHP_EOL);
fclose($fp);

echo "Appended log file".PHP_EOL;

?>
