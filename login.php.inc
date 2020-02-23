<?php

class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("192.168.10.6","admin","admin","it490");

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
	$statement = "select * from users where screenname = '$un'";
	$response = $this->logindb->query($statement);

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

public function registerUser($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where screenname = '$un'";
	
	$response = $this->logindb->query($statement);
	
	if($response->fetch_assoc() < 1)//if no one matches that username, register it
	{
		$statement = "insert into login values(null, '$un','$pw')";
		
		$response = $this->logindb->query($statement);
		
		return 0;//success
	}
	else
	{
		echo("Username already exists!".PHP_EOL);
		return -1;//Need to log that this is a registration of the same username
	}
}
}
?>
