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

		$ec = $response != -1;

		echo($ec);
		
		if((int)$response != -1)
		{
			$_SESSION['user'] = $user;
			$_SESSION['userID'] = $response;
			$_SESSION['loggedIn'] = true;			
		}
	}
}

session_write_close();

header('Location: index.php'); 
exit;
?>
