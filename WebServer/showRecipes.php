<?php
session_start();

require_once("testClient.php.inc");	
require_once("sendDisLog.php");	

$client = new Client();
$user = trim($_SESSION['user']);


$response = $client->GetRecipe( $user, "DMZ");

		
if(!empty($_SESSION['likedislikes']))
{
	$index = 0;

	foreach($response as $r)
	{
		$_SESSION['likedislikes'][$index++] = $r; 
	}
}

session_write_close();		
header('Location: profilePage.php');
exit;

?>
