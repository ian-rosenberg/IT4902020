#!/usr/bin/php
<?php

$logindb = new mysqli("127.0.0.1","ddembner","it490passwd","it490");

if ($logindb->connect_errno != 0)
{
	echo "Error connecting to database: ".$logindb->connect_error.PHP_EOL;
	exit(1);
}
echo "correctly connected to database".PHP_EOL;


$query = $logindb->query("select * from user join restrictions
	where user.userid = restrictions.userid and user.username = 'david'");

while($row = $query->fetch_assoc()){
	
	//print_r($row);
	echo "$row[restriction]".PHP_EOL;
}

?>
