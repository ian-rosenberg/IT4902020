#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini", "logServer");

$request = array();
$request['type'] = "fanout";
$request['message'] = $argv[1];

$response = $client->send_request($request);

print_r($response);
?>
