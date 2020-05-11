<?php
	session_start();
	
	require_once('testClient.php.inc');
	
	
if(!empty($_POST))
{
	$user = trim($_POST['username']);
	$pass = trim($_POST['password']);
	
	$client = new Client();
	$response = $client->RegisterConnect($user, $pass, 'Register');
	
	 header('Location: index.php'); 
	 exit;
}
header('Location: index.php');
exit;
?>
