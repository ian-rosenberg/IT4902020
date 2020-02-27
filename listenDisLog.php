#!/usr/bin/php
<?php
require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');
echo "Now Listening for fanouts".PHP_EOL;


function requestProcessor($request)
{

	echo "Recieved request".PHP_EOL;
	return 1;

}

$server = new rabbitMQServer("testRabbitMQ.ini", "logServer");

$server->process_requests('requestProcessor');
?>
