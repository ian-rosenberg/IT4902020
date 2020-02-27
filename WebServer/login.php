<?php	
	$user = isset($_POST['username']) ? $_POST['username'] : '';
        $pass = isset($_POST['password']) ? $_POST['password'] : '';
	
	
	require_once("testClient.php.inc");	
	
if(isset($user) && isset($pass))
{
	$client = new Client();
	
	echo("Before connect");
	
	$response = $client->Connect($user, $pass, 'Login');
	
	echo("after login connect");
	
	if($response != 0)
	{
			$_SESSION['user'] = $user;
	
			$_SESSION['loggedIn'] = true;
	}
	
	 header('Location: index.html'); 
	 exit;
}
else
{
	echo("Something wasnt set!");
}
?>
