<?php
	
	require_once("testClient.php.inc");
	
	
if(isset($_POST))
{
	$user = $_POST["username"].trim();
	$pass = $_POST["password"].trim();

	$_SESSION["user"] = "guest";
	
	$_SESSION["loggedIn"] = false;
	
	$client = new Client();
	$response = $client->Connect($user, $pass, "Logout");
	 header("Location: index.php"); 
	 exit
}
?>
