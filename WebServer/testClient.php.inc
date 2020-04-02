<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('sendDisLog.php');

Class Client {

#	private $client;
	
	public function __construct() {
#		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	}

	public function LoginConnect($username, $pass, $sessionType) {
		
		$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
		
		if(!$client){
			return "Did not get new client";
		}
		
		SendToLogger("Login");

		$request = array();
		$request['username'] = $username;
		$request['password'] = $pass;
		$request['type'] = 'Database';
		$request['queryType'] = 'insert';
		$request['query'] = "update login set loggedIn = 1 where username ='".$username."' and password ='".$pass."' and loggedIn = 0";
		$request['message'] = $sessionType;

		$response = $client->send_request($request);
		//$response = $client->publish($request);
		return json_encode($response);
	}

	public function Test() {

		return "Test";
	}

	public function LogoutConnect($username, $sessionType) {
		
		$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
		
		if(!$client){
			return "Did not get new client";
		}

		SendToLogger("Logout");

		$request = array();
		$request['username'] = $username;
		$request['type'] = 'Database';
		$request['queryType'] = 'insert';
		$request['query'] = "update login set loggedIn = 0 where username ='".$username."'";
		$request['message'] = $sessionType;

		$response = $client->send_request($request);
		//$response = $client->publish($request);
		return json_encode($response);
	}

	public function RegisterConnect($username, $pass, $sessionType) {
		
		$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
		
		if(!$client){
			return "Did not get new client";
		}

		SendToLogger("Register");

		$request = array();
		$request['username'] = $username;
		$request['password'] = $pass;
		$request['type'] = 'Database';
		$request['queryType'] = 'insert';
		$request['query'] = "insert into login(username, password, loggedIn) values('".$username."', '".$pass."', 0)";
		$request['message'] = $sessionType;

		$response = $client->send_request($request);
		//$response = $client->publish($request);
		return json_encode($response);
	}
}
?>
