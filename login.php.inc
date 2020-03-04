<?php

class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("192.168.10.9","david","admin","it490");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from it490.login where username  = '$un'";
	$response = $this->logindb->query($statement);
	if(!$response){
		throw new Exception("Database Error [{$this->logindb->errno}] {$this->logindb->errno}");
		return;
	}
	
	while ($row = $response->fetch_assoc())
	{
		echo "checking password for $username".PHP_EOL;
		if ($row["password"] == $pw)
		{
			echo "passwords match for $username".PHP_EOL;
			return 1;// password match
		}
		echo "passwords did not match for $username".PHP_EOL;
	}
	return 0;//no users matched username
}
}
?>
