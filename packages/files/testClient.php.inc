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

	public function GetRecipe($username, $sessID) {

                $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
		$clientB = new rabbitMQClient("testRabbitMQ.ini", "brandonServer");
                if(!$client){
                        return "Did not get new client";
                }

		$request = array();
                $request['type'] = 'Database';
                $request['queryType'] = 'select';
		$request['query'] = "select vegan, vegetarian, dairyFree, glutenFree, calories from restrictions join calbudget where restrictions.id = $sessID and calbudget.id = $sessID";
		$request['message'] = 'recipe restrictions';
		SendToLogger("Get recipe Restrctions");

		$r1 = $client->send_request($request);

		$vegetarian = $r1[0]['vegetarian'];
		$dairyFree = $r1[0]['dairyFree'];
		$glutenFree = $r1[0]['glutenFree'];
		$dairyFree = $r1[0]['dairyFree'];
		$vegan = $r1[0]['vegan'];
		$calories = $r1[0]['calories'];

		$request = array();
		$request['calories'] = $calories;	
		$request['userID'] = $sessID;
                $request['vegetarian'] = $vegetarian;
		$request['vegan'] = $vegan;
		$request['dairyFree'] = $dairyFree;
		$request['glutenFree'] = $glutenFree;
                $request['type'] = 'DMZ';
		$request['message']= 'getting recipes';

                $response = $clientB->send_request($request);
                
                return $response;
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
		$request['query'] = "update bmi set height = '$height', weight = '$weight', bmi = '$bmi', metric = '$metricFlag' where id = $userID";
                $request['message'] = $sessionType;

                $response = $client->send_request($request);
                //$response = $client->publish($request);
                return json_encode($response);
        }

	public function StoreBMR($losegain, $weightchange, $calories, $bmr, $userID, $metricFlag, $days) {

                $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

                if(!$client){
                        return "Did not get new client";
                }

                SendToLogger("Update BMR");

                $request = array();
                $request['userBMI'] = $bmi;
                $request['metric'] = $metricFlag;
                $request['type'] = 'Database';
                $request['queryType'] = 'update';
		$request['query'] = "update calbudget set bmr = '$bmr', losegain = '$losegain', weightchange = '$weightchange', days = '$days', calories = '$calories',  metric = '$metricFlag' where id = $userID";
                $request['message'] = $sessionType;

                $response = $client->send_request($request);
                //$response = $client->publish($request);
                return json_encode($response);
	}
}
?>
