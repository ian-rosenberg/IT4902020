#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('handleUsers.php.inc');
//require_once('sendDisLog.php');

function doDatabaseTransaction($request){
  $client = new rabbitMQClient("testRabbitMQ.ini","dbServer");
  $response = $client->send_request($request);
  return $response;

}

function doUpdate($request){
	$client = new rabbitMQClient("testRabbitMQ.ini", $request['server']);

}

function doRollback($request){

}

function doService($request){

}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }

  //SendToLogger("Deployment " . $request['message']);

  switch ($request['type'])
  {
  	case "update":
		$client = null;
		switch ($request['server'])
		{
			case "rabbitMQ":
				//$client = new rabbitMQClient("testRabbitMQ.ini", "rabbitMQ.prod");
				$path = "~/git/IT4902020/deployment/rabbitMQ/rabbitMQPackage.tar.gz ubuntu@10.0.1.216:~/git/it490/packages";
				break;
			case "frontEnd":
				$client = new rabbitMQClient("testRabbitMQ.ini", "frontEnd.prod");
				$path = "~/git/IT4902020/deployment/frontEnd/something ubuntu@10.0.1.something: something";
				break;
			case "DMZ":
				$client = new rabbitMQClient("testRabbitMQ.ini", "DMZ.prod");
				$path = "~git/IT4902020/deployment/DMZ/something ubuntu@10.0.1.something: something";
				break;
			default:
				break;
		}
		shell_exec("scp " .$path);
		return "no";
	case "rollback":
		break;
	case "service":
		break;
   	default:
   		break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","deployment");
//SendToLogger("Deployment Machine Start");
//echo "deployment BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
//SendToLogger("Deployment Machine shutdown");
//echo "deployment END".PHP_EOL;
exit();
?>
