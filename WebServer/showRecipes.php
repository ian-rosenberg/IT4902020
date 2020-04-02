<?php
session_start();

require_once("testClient.php.inc");	
require_once("sendDisLog.php");	

	$client = new Client();
	$response = $client->GetRecipe( $user, $pass, "DMZ");
		
	sendToLogger($response);
	session_write_close();		
	header('Location: profilePage.php');
	exit;
?>
