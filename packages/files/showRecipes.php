<?php
session_start();

require_once("testClient.php.inc");	
require_once("sendDisLog.php");	

$client = new Client();
$user = trim($_SESSION['user']);
$id = trim($_SESSION['userID']);

$response = $client->GetRecipe( $user, $id);

		
if(!empty($_SESSION['likedislikes']))
{
	for($i = 0; $i < 3; $i++)
	{
		$_SESSION['likedislikes'][$i]["title"] = $response[$i]["title"];
		$_SESSION['likedislikes'][$i]["imgUrl"] = $response[$i]["imgUrl"];
		$_SESSION['likedislikes'][$i]["url"] = $response[$i]["url"];
	}
}

session_write_close();		
header('Location: profilePage.php');
exit;

?>
