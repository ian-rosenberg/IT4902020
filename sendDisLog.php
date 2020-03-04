#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');

function SendToLogger($message){
	
	$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");
	//$request = array();
	//$request['type'] = "fanout";
	//$request['message'] = $argv[1];
	//$response = $client->send_request($request);
	//$response = $client->publish($request);
	$client->publish($message, 15000);
}

?>
