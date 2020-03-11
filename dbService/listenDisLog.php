#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');

echo "Now Listening for rabbitMQ messages".PHP_EOL;


function requestProcessor($request)
{

	echo "Recieved request".PHP_EOL;
	if($request['type'] == 'Database'){
		echo "Processing Data Query".PHP_EOL;
		try{
			$db = new mysqli("127.0.0.1", "ddembner", "it490passwd", "testdb");
			//print_r($request).PHP_EOL;
			$query = $db->real_escape_string($request['query']);
			$response = $db->query($query);
			print_r($response).PHP_EOL;
			while($row = $response->fetch_row()){
				$rows[] = $row;
			}
			$response->close();
			$db->close();
			return $rows;

		}catch(Exception $e){

			print_r($e->getMessage());
			return $e->getMessage();
		}
	}
	
	
	

}

$server = new rabbitMQServer("testRabbitMQ.ini", "dbServer");

$server->process_requests('requestProcessor');




?>
