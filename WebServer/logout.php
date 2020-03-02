<?php
	session_start();
	
	require_once("testClient.php.inc");
	
	
	$user = trim($_SESSION["user"]);

	if(isset($_SESSION["user"])){
		unset($_SESSION["user"]);
	}
	
	$_SESSION["loggedIn"] = false;
	
	$client = new Client();
	$response = $client->Connect($user, $pass, "Logout");
	
	session_destroy();
	
	 header("Location: index.php"); 
	 exit
?>
