#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');

echo "Now Listening for fanouts".PHP_EOL;


function requestProcessor($request)
{

	echo "Recieved request".PHP_EOL;
	WriteToLog($request);
	echo "Successfully wrote to log",PHP_EOL;
	//print_r($request);
	

}


function WriteToLog($message){
	$fp = fopen('SFW_log.txt', 'a');
	fwrite($fp, $message.PHP_EOL);
	fclose($fp);
}

$server = new rabbitMQServer("testRabbitMQ.ini", "logServer");

$server->process_requests('requestProcessor');

/*
$machine = getHostInfo(array("testRabbitMQ.ini"));
$server = "logServer";
$params = array();
$params['host'] =  $machine[$server]["BROKER_HOST"];
$params['port'] = $machine[$server]["BROKER_PORT"];
$params['login'] = $machine[$server]["USER"];
$params['password'] = $machine[$server]["PASSWORD"];
$params['vhost'] = $machine[$server]["VHOST"];
$connection = new AMQPConnection($params);
//$channel = $connection->channel();
*/




?>
