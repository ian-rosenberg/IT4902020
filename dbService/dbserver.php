#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');
include('sendDisLog.php');

echo "Now Listening for rabbitMQ messages".PHP_EOL;

echo SendToLogger("DB Server start");

function requestProcessor($request)
{

	echo "Recieved request".PHP_EOL;
	switch($request['queryType']){
		case 'select':
			echo "Processing Data Query".PHP_EOL;
			try{
				$db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
				print_r($request).PHP_EOL;
				$query = $db->real_escape_string($request['query']);
				$response = $db->query($query);
				print_r($response).PHP_EOL;
				while($row = $response->fetch_assoc()){
					$rows[] = $row;
				}
				$response->close();
				$db->close();
				return $rows;

			}catch(Exception $e){

				print_r($e->getMessage());
				return $e->getMessage();
			}
		 case 'insert':
                        echo "Processing Data Query".PHP_EOL;
                        try{
                                $db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
                                print_r($request).PHP_EOL;
                                //$query = $db->real_escape_string($request['query']);
                                $query = $request['query'];
                                $response = $db->query($query);
                                var_dump($response);
                                if($db->affected_rows != 0){
                                        return 1;
                                }
                                else{
                                        return -1;
                                }
                                return $response;
                                $response->close();
                                $db->close();
                        }
                        catch(Exception $e){

                                  print_r($e->getMessage());
                                  return $e->getMessage();
                        }
		case 'register':
			echo "Processing Data Query".PHP_EOL;
                        try{
                                $db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
                                print_r($request).PHP_EOL;
				//$query = $db->real_escape_string($request['query']);
				$query = $request['query'];
				$response = $db->query($query);
				var_dump($response);
				if($db->affected_rows != 0){
					$username=$request['username'];
					$query1="insert into bmi(id) select login.id from login where login.username='$username'";
					$query2="insert into calbudget(id) select login.id from login where login.username='$username'";
					$db->query($query1);
					$db->query($query2);
					return 1;
				}
				else{
					return -1;
				}	
				return $response;
				$response->close();
				$db->close();
			}
			catch(Exception $e){
 
                                  print_r($e->getMessage());
                                  return $e->getMessage();
			}
		case 'update':
                        echo "Processing Data Query".PHP_EOL;
			try{
				$db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
				print_r($request).PHP_EOL;
				//$query = $db->real_escape_string($request['query']);
				$query = $request['query'];
				$response = $db->query($query);
				var_dump($response);
				if($db->affected_rows != 0){
					return 1;
				}
				else{
					return -1;
				}
				return $response;
				$response->close();
				$db->close();
			}
			catch(Exception $e){
				print_r($e->getMessage());
				return $e->getMessage();
			}
		case 'DMZ':
			return 1;
	}

	/**if($request['type'] == 'Database'){
		echo "Processing Data Query".PHP_EOL;
		try{
			$db = new mysqli("127.0.0.1", "david", "admin", "it490");
			//print_r($request).PHP_EOL;
			$query = $db->real_escape_string($request['query']);
			$response = $db->query($query);
			print_r($response).PHP_EOL;
			while($row = $response->fetch_assoc()){
				$rows[] = $row;
			}
			$response->close();
			$db->close();
			return $rows;

		}catch(Exception $e){

			print_r($e->getMessage());
			return $e->getMessage();
		}
	}*/
	
	
	

}

$server = new rabbitMQServer("testRabbitMQ.ini", "dbServer");

$server->process_requests('requestProcessor');



?>
