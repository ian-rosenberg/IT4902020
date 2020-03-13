#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$request = array();
$request['type'] = "Database";
$request['queryType'] = 'insert';
$request['query'] = "update login set loggedIn = 0 where username = 'ian' and password='admin' and loggedIn = 0";
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);

echo "\n\n";

echo $argv[0]." END".PHP_EOL;

