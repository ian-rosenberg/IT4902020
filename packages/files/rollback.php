#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

if($argc < 2){
	echo "Didn't provide argument (start, stop, restart)".PHP_EOL;
	exit();
}

$valid = false;

switch($argv[1]){

case "start":
	$valid = true;
	break;
case "stop":
	$valid = true;
	break;
case "restart":
	$valid = true;
	break;
case "status":
	$valid = true;
	break;
default:
	echo "Invalid argument $argv[1]".PHP_EOL;
	exit();
}

$client = new rabbitMQClient("testRabbitMQ.ini", "brandonServer");
$request = array();
$request['type'] = "service";
$request['server'] = "frontEnd";
$request['command'] = $argv[1];

$response = $client->send_request($request);

var_dump($response);

echo "END".PHP_EOL;

?>
