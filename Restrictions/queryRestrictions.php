#!/usr/bin/php
<?php

$stmt = "SELECT * FROM user JOIN restrictions 
	WHERE user.userid = 1 AND user.userid = restrictions.userid";

$logindb = new mysqli("127.0.0.1", "ddembner", "it490passwd", "it490");

if($logindb){
	echo "successfully logged into db".PHP_EOL;
}
else {
	echo "or not".PHP_EOL;
}


$result = $logindb->query($stmt);

print_r($result).PHP_EOL;

?>
