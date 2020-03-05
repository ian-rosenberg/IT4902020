#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('handleUsers.php.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new DatabaseAccess();
    return $login->validateLogin($username,$password);
    //return false if not valid
}

function doRegisterUser($username, $password)
{
		$login = new DatabaseAccess();
		return $login->RegisterUser($username, $password);
}

function doLogoutUser($username, $password)
{
		$login = new DatabaseAccess();
		return $login->LogoutUser($username, $password);
}

function requestProcessor($request)
{
  $response = "";
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "Login":
      $response = doLogin($request['username'],$request['password']);
	  break;
    case "Register":
      $response = doRegisterUser($request['username'], $request['password']);
	  break;
	 case "Logout":
	  $response = doLogoutUser($request['username'], $request['password']);
	  break;
	  default:
	  break;
  }
  echo("Response ".$response.PHP_EOL);
  
  return array("returnCode" => '0', 'message'=>"Server received request and processed.");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
 
