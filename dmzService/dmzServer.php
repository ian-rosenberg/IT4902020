#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');

echo "Now Listening for rabbitMQ messages".PHP_EOL;


function requestProcessor($request)
{
	#RETURN WHATEVER NEEDS TO BE SENT TO RABBITMQ
}

#Second parameter must match info from testRabbitMQ.ini
$server = new rabbitMQServer("testRabbitMQ.ini", "dmzServer");

$server->process_requests('requestProcessor');




?>
