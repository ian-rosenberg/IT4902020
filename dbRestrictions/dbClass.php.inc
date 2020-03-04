#!/usr/bin/php
<?php

/*
 * 
 * A class to make the database object
 *
 */ 

Class DatabaseLogin {
private $db;

public function __construct($ip, $username, $password, $database){
	
	$this->db = new mysqli($ip, $username, $password, $database);

	if ($this->db->connect_errno != 0) {
		echo "Error connecting to database: ".$this->db->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function Query($query){
	
	return $this->db->query($query);
	
	//$logindb->query("select * from user join restrictions
	//where user.userid = restrictions.userid and user.username = 'david'");
	/*
	while($row = $query->fetch_assoc()){
	
		//print_r($row);
		echo "$row[restriction]".PHP_EOL;
	}
	 */
}

}
?>
