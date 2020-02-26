<?php

class DatabaseAccess
{
	private $logindb;

	public function __construct()
	{
		$this->logindb = new mysqli("192.168.1.7","admin","admin","it490");

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
		$statement = "select * from login where username = '$un'";
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
		$statement = "select * from login where userame = '$un'";
		
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
	
	public function logoutUser($username, $password)
	{
		$un = $this->logindb->real_escape_string($username);
		$pw = $this->logindb->real_escape_string($password);
		
		$statement = "select * from login where username = '$un' and password = '$pw' and loggedIn = 1";
		$response = $this->logindb->query($statement);

		if ($row = $response->fetch_assoc() === 1)
		{
			echo "Logging out $username".PHP_EOL;
			
			$statement = "update login set loggedIn = 0 where username = '$un' and password ='$pw'";
		
			$response = $this->logindb->query($statement);
			
			echo "Logged out $username".PHP_EOL;
		}
		else
		{
			echo "User already logged out!".PHP_EOL;
			
			return 0;//no users matched username
		}
	}
}
?>
