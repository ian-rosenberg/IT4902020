<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('sendDisLog.php');

Class Client{

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
		$request['queryType'] = 'login';
		$request['query'] = "update login set loggedIn = 1 where username = '$username' and password = '$pass' and loggedIn = 0";
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
		$request['queryType'] = 'update';
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
		$request['queryType'] = 'register';
		$request['query'] = "insert into login(username, password, loggedIn) values('".$username."', '".$pass."', 0)";
		$request['message'] = $sessionType;

		$response = $client->send_request($request);
		//$response = $client->publish($request);
		return json_encode($response);
	}

	public function LikeDislikeConnect($username, $pass, $sessionType) {

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

	public function GetRecipe($username, $sessionType) {

                $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

                if(!$client){
                        return "Did not get new client";
                }

                SendToLogger("Get Recipe");

                $request = array();
                $request['username'] = $username;
                $request['type'] = 'DMZ';
                $request['message'] = $sessionType;

                $response = $client->send_request($request);
                //$response = $client->publish($request);
                return json_encode($response);
        }

	public function StoreBMI($bmi, $height, $weight, $userID, $metricFlag) {

                $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

                if(!$client){
                        return "Did not get new client";
                }

                SendToLogger("Store BMI");

                $request = array();
		$request['userBMI'] = $bmi;
		$request['metric'] = $metricFlag;
                $request['type'] = 'Database';
		$request['queryType'] = 'update';
		$request['query'] = "update bmi set height = '$height', weight = '$weight', bmi = '$bmi', metric = '$metricFlag' where id = '$userID'";
                $request['message'] = $sessionType;

                $response = $client->send_request($request);
                //$response = $client->publish($request);
                return json_encode($response);
        }

	public function StoreBMR($losechange, $weightchange, $calories, $bmr, $height, $weight, $userID, $metricFlag) {

                $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

                if(!$client){
                        return "Did not get new client";
                }

                SendToLogger("Store BMR");

                $request = array();
                $request['userBMI'] = $bmi;
                $request['metric'] = $metricFlag;
                $request['type'] = 'Database';
                $request['queryType'] = 'update';
		$request['query'] = "update calbudget set height = '$height', weight = '$weight', bmr = '$bmr', losechange = '$losechange', weightchange = '$weightchange', days = '$days', calories = '$calories', metric = '$metricFlag' where id = '$userID'";
                $request['message'] = $sessionType;

                $response = $client->send_request($request);
                //$response = $client->publish($request);
                return json_encode($response);

}
?>
