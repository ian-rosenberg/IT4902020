<?php
session_start();

require_once("testClient.php.inc");	
require_once("sendDisLog.php");	

	$client = new Client();
	$user = trim($_SESSION['user']);
	$response = $client->GetRecipe( $user, "DMZ");
		
	sendToLogger($response);

	$_SESSION

	session_write_close();		
	header('Location: profilePage.php');
	exit;
?>
