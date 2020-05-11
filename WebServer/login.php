<?php
session_start();

require_once("testClient.php.inc");	
	
if(!empty($_POST))
{
	$client = new Client();
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	
	if(empty($_SESSION) || $_SESSION['user'] == 'guest')
	{
		$response = $client->LoginConnect( $user, $pass, 'Login');
		
		if($response == true)
		{
			$_SESSION['user'] = $user;
	
			$_SESSION['loggedIn'] = true;			
		}
	}
	else
	{
		$_SESSION['user'] = 'guest';
	
		$_SESSION['loggedIn'] = false;
	}
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
