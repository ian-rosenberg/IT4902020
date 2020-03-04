#!/usr/bin/php
<?php
require_once('dbClass.php.inc');

$db = new DatabaseLogin("127.0.0.1", "ddembner", "it490passwd", "it490");

$query = $db->Query("select restriction from user join restrictions
	where user.userid = restrictions.userid and user.username = 'david'");

//print_r($query).PHP_EOL;

$restrictions = array();

while($row = $query->fetch_assoc()){

	//print_r($row).PHP_EOL;
	array_push($restrictions, $row);

}

print_r($restrictions).PHP_EOL;

/*
foreach($restrictions as $restriction){
	$value = $restriction['restriction'];
	echo "Don't want recipes with $value".PHP_EOL;
}
 */

?>
