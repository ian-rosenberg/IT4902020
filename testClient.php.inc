<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
Class Client {

	#private $client;
	
	public function __construct() {
		$$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	}

	public function Connect($username, $pass, $sessionType) {
		
		$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
		
		if(!$client){
			return "Did not get new client";
		}
		$request = array();
		$request['username'] = $username;
		$request['password'] = $pass;
		$request['type'] = $sessionType;
		$request['message'] = $sessionType;

		$response = $client->send_request($request);
		//$response = $client->publish($request);
		return $response;
	}

	public function Test() {

		return "Test";
	}
}
?>