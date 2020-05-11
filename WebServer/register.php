<?php
	session_start();
	
	require_once('testClient.php.inc');
	
	
if(isset($_POST))
{
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	
	$client = new Client();
	$response = json_encode($client->RegisterConnect($user, $pass, 'Register'));
	
	if(json_decode($response) !=0)
	{
			$_SESSION['user'] = $user;
	
			$_SESSION['loggedIn'] = true;
	}
	
	 header('Location: index.php'); 
	 exit;
}
?>
