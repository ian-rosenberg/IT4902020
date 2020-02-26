<?php
	session_start();
	
	require_once("testClient.php.inc");
	
	
if(array_key_exists("username" ,$_POST) &&
 array_key_exists("password", $_POST)
{
	$user = $_POST["username"].trim();
	$pass = $_POST["password"].trim();
	$sessionType  = $_POST["type"].trim();

	$_SESSION["user"] = $user;
	
	$_SESSION["loggedIn"] = true;
	
	$client = new Client();
	$response = $client->Connect($user, $pass, "Register");
}
?>