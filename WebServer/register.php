<?php
	
	require_once('testClient.php.inc');
	
	
if(isset($_POST))
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$client = new Client();
	$response = $client->Connect($user, $pass, 'Register');
	
	if($response != 0)
	{
			$_SESSION['user'] = $user;
	
			$_SESSION['loggedIn'] = true;
	}
	
	 header('Location: index.html'); 
	 exit;
}
?>
