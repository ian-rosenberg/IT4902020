<?php
	session_start();
	
	require_once("testClient.php.inc");
	
	$user = trim($_SESSION['user']);
		
	$client = new Client();
	$response = $client->LogoutConnect($user, "Logout");
	
	session_destroy();
	
	 header("Location: index.php"); 
	 exit
?>
