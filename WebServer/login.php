<?php
session_start();

require_once("testClient.php.inc");	
require_once("sendDisLog.php");	

if(!empty($_POST))
{
	$client = new Client();
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	
	if(empty($_SESSION))
	{
		$response = $client->LoginConnect( $user, $pass, "Login");
		
		sendToLogger($response);

		if($response == 1)
		{
			$_SESSION['user'] = $user;
	
			$_SESSION['loggedIn'] = true;			
		}
	}
	else
	{
		session_write_close();		
		header('Location: index.php');
		
		exit;
	}
}

session_write_close();

header('Location: index.php'); 
exit;
?>
