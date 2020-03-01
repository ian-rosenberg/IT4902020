<?php
session_start();

require_once("testClient.php.inc");	
	
if(isset($_POST))
{
	$client = new Client();
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	$response = $client->Connect( $user, $pass, 'Login');
	
	if($response != 0)
	{
			$_SESSION['user'] = $user;
	
			$_SESSION['loggedIn'] = true;
	}
	else
	{
		$_SESSION['user'] = 'guest';
	
		$_SESSION['loggedIn'] = false;
	}
	
	session_write_close();
	
	 header('Location: index.php'); 
	 exit;
}
else
{
	$_SESSION['user'] = 'guest';
	
	$_SESSION['loggedIn'] = false;
}
	
	session_write_close();
	
	header('Location: index.php'); 
	exit;
?>