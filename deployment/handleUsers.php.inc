<?php
require_once('sendDisLog.php');
class DatabaseAccess
{
	private $logindb;

	public function __construct()
	{
		$this->logindb = new mysqli("192.168.10.3","david","admin","it490");

		if ($this->logindb->connect_errno != 0)
		{
			echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
			die ('Failed to connect to MySQL: '.mysqli_connect_error());
			exit(1);
		}
		sendToLogger("correctly connected to database").PHP_EOL;
	}			

	public function validateLogin($username,$password)
	{
		$un = $this->logindb->real_escape_string($username);
		$pw = $this->logindb->real_escape_string($password);
		$sess = 1;
		
		$statement = $this->logindb->prepare('update login set loggedIn = ? where username = ? and password = ?');
		$statement->bind_param('iss', $sess, $un, $pw);
		$statement->execute();
		$statement->store_result();
		//print_r(mysqli_stmt_affected_rows($statement)).PHP_EOL;
		if(mysqli_stmt_affected_rows($statement) == 1)
		{
			$statement->close();

			$this->logindb->close();
			sendToLogger("Successfully logged in $username").PHP_EOL;
			echo "passwords match for $username".PHP_EOL;
			return 1;// password match
		}
		
		sendToLogger("Failed to log in $username").PHP_EOL;
		echo "no match!".PHP_EOL;

		$statement->close();

		$this->logindb->close();
		
		return -1;//no users matched username
	}

	public function registerUser($username,$password)
	{
		$un = $this->logindb->real_escape_string($username);
		$pw = $this->logindb->real_escape_string($password);
		$sess = 1;
		
		$statement = $this->logindb->prepare('select * from login where username = ?');
		$statement->bind_param('s', $un);
		$statement->execute();
		$statement->store_result();
		
		if(mysqli_stmt_affected_rows($statement) == 0)//if no one matches that username, register it
		{
			$statement->close();

			$statement = $this->logindb->prepare('insert into login values(null, ?, ?, ?)');
			$statement->bind_param('ssi', $un, $pw, $sess);
			$statement->execute();

			$statement->close();
			
			$this->logindb->close();
			sendToLogger("Registered $un").PHP_EOL;
			echo("Registered ".$un.PHP_EOL);
			
			return 1;//success
		}
		else
		{
			$statement->close();

			$this->logindb->close();
			sendToLogger("Username already exists").PHP_EOL;
			echo("Username already exists!".PHP_EOL);
			return -1;//Need to log that this is a registration of the same username
		}
	}
	
	public function logoutUser($username)
	{
		$un = $this->logindb->real_escape_string($username);
		//$pw = $this->logindb->real_escape_string($password);
		$sess = 0;
		
		echo "Logging out $username".PHP_EOL;
					
		$statement = $this->logindb->prepare('update login set loggedIn = ? where username = ?');
		$statement->bind_param('is', $sess, $un);
		$statement->execute();
		$statement->store_result();

		if (mysqli_stmt_affected_rows($statement) == 1)
		{
			$statement->close();
			


			$this->logindb->close();
			
			echo "Logged out $username".PHP_EOL;

			return 1;//successful logout
		}
		else
		{
			$statement->close();

			$this->logindb->close();

			echo "User already logged out!".PHP_EOL;
			
			return -1;//no users matched username
		}
	}

	public function queryFromDatabase($message){
		
	}

	public function queryRestrictions($username) {
		$un = $this->logindb->real_escape_string($username);
		$query = "SELECT restriction FROM login JOIN restrictions
			WHERE login.id = restrictions.id
			 AND  login.username = '$un'";

		$result = $this->logindb->query($query);

		$this->logindb.close();

		if($result != null){
			sendToLogger("Successfully queried restrictions").PHP_EOL;
			return $result;
		}
		else{
			sendToLogger("Failed queried restrictions").PHP_EOL;
			return -1;
		}
	}

	public function insertRestriction($username, $restriction) { 
		$un = $this->logindb->real_escape_string($username);
		$restrict = $this->logindb->real_escape_string($restriction);


		$statement = $this->logindb->prepare("INSERT INTO restrictions (id, restriction) SELECT  login.id, ? WHERE login.username = ?");
		$statement->bind_param('ss', $un, $restrict);
		$statement->execute();

		$statement->close();
		
		$this->logindb->close();
		sendToLogger("Inserted new restriction for $un with $restrict").PHP_EOL;
	}

	public function removeRestriction($username, $restriction) { 
		$un = $this->logindb->real_escape_string($username);
		$restrict = $this->logindb->real_escape_string($restriction);


		$statement = $this->logindb->prepare("DELETE restrictions from restrictions INNER JOIN login ON login.id = restrictions.id where restrictions.restriction = ? and login.username = ?");
		$statement->bind_param('ss', $un, $restrict);
		$statement->execute();

		$statement->close();
		
		$this->logindb->close();
		sendToLogger("Deleted restriction for $un with $restrict").PHP_EOL;
	}
}
?>
