#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');
include('sendDisLog.php');

echo "Now Listening for rabbitMQ messages".PHP_EOL;

echo SendToLogger("DB Server start");

function recipes($arr, $db){
	$title = $arr['title'];
        $url = $arr['spoonacularSourceUrl'];
        $id = $arr['id'];
        //$imageType = $arr['imageType'];
        $imageUrl = "https://spoonacular.com/recipeImages/$id-240x150.jpg";
        $calories = $arr['nutrition']['nutrients'][0]['amount'];

        $query = "insert into recipes(recipes_name, calories, url, image, recipe_id) values('$title', $calories, '$url', '$imageUrl', $id)";
	$db->query($query);
	if($db->affected_rows != 0){
        	return 1;
        }
        else{
                return -1;
        }
}

function restrictions($arr, $db){
	$vegetarian = (int)$arr['vegetarian'];
        $vegan = (int)$arr['vegan'];
        $gluten = (int)$arr['glutenFree'];
	$dairy = (int)$arr['dairyFree'];
	$id = $arr['id'];

	$query = "insert into recipe_restrictions(id, vegetarian, vegan, glutenFree, dairyFree) select recipes.id, $vegetarian, $vegan, $gluten, $dairy from recipes where recipes.recipe_id = $id";

	$db->query($query);
        if($db->affected_rows != 0){
                return 1;
        }
        else{
                return -1;
        }
}

function ingredients($arr, $db){
	for($i = 0; $i < count($arr['extendedIngredients']); $i++){
		$name = $arr['extendedIngredients'][$i]['name'];
		$amount = $arr['extendedIngredients'][$i]['amount'];
		$unit = $arr['extendedIngredients'][$i]['unit'];
		$id = $arr['id'];

		$query = "insert into ingredients(id, ingredients_name, amount, measurement) select recipes.id, '$name', $amount, '$unit' from recipes where recipes.recipe_id = $id";
		$db->query($query);        
	}
	if($db->affected_rows != 0){
        	return 1;
        }
        else{
                return -1;
        }

}

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
					$bmi="insert into bmi(id) select login.id from login where login.username='$username'";
					$calbudget="insert into calbudget(id) select login.id from login where login.username='$username'";
					$restrictions="insert into restrictions(id) select login.id from login where login.username='$username'";
					$db->query($bmi);
					$db->query($calbudget);
					$db->query($restrictions);
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
		case 'login':
                        echo "Processing Data Query".PHP_EOL;
                        try{
                                $db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
                                print_r($request).PHP_EOL;
                                //$query = $db->real_escape_string($request['query']);
                                $query = $request['query'];
                                $db->query($query);
				if($db->affected_rows != 0){
					$username = $request['username'];
					$query = "select login.id from login where login.username = '$username'";
					$response = $db->query($query);
					$id = mysqli_fetch_assoc($response);
					return $id['id'];
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
			$db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
			
			for($i=0; $i < 3; $i++){
				$arr = json_decode($request[$i], true);
				//var_dump($arr);
				//$dump = $arr['extendedIngredients'];
				//echo "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@";
				//var_dump(count($dump));

				if(recipes($arr, $db) == -1){
					continue;
				}
				elseif(restrictions($arr, $db) == -1){
					continue;	
				}
				elseif(ingredients($arr, $db) == -1){
					continue;
				}

				/**$title = $arr['title'];
				$url = $arr['spoonacularSourceUrl'];
				$id = $arr['id'];
				$imageType = $arr['imageType'];
				$imageUrl = "https://spoonacular.com/recipeImages/$id-240x150.jpg";
				$calories = $arr['nutrition']['nutrients'][0]['amount'];
				$vegetarian = $arr['vegetarian'];
				$vegan = $arr['vegan'];
				$gluten = $arr['glutenFree'];
				$dairy = $arr['dairyFree'];

				$recipe = "insert into recipes(name, calories, url, image, recipe_id) values('$title', $calories, '$url', '$imageUrl', $id)"; 
				$restrictions = "insert into recipe_restrictions(vegetarian, vegan, glutenFree, dairyFree) values ('$vegetarian', '$vegan', '$gluten', '$dairy')";
				$ingredients

				$response1 = $db->query($recipe);
				$response2 = $db->query($restrictions);
				//$response3 = $db->query($ingredients);

				var_dump($response1);
				var_dump($response2);
				var_dump($response3);
				echo "$title, $url, $id, $imageType, $imageUrl, $calories";*/

			}
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
