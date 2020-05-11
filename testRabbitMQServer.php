#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('handleUsers.php.inc');
require_once('sendDisLog.php');


function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    $login = new DatabaseAccess();
    return $login->validateLogin($username,$password);
    //return false if not valid
}

function doRegisterUser($username, $password)
{
    $login = new DatabaseAccess();
    return $login->RegisterUser($username, $password);
}

function doLogoutUser($username, $password)
{
    $login = new DatabaseAccess();
    return $login->LogoutUser($username, $password);
}

function doQueryRestrictions($username)
{
        $login = new DatabaseAccess();
        return $login->queryRestrictions();
}

/*
function doDatabaseTransaction($request){
  $client = new rabbitMQClient("testRabbitMQ.ini","dbServer");
  $response = $client->send_request($request);
  return $response;

}
*/

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

function doDatabaseTransaction($request){
        echo "Recieved request".PHP_EOL;
        switch($request['queryType']){
                case 'select':
                        echo "Processing Data Query".PHP_EOL;
                        try{
                                $db = new mysqli("127.0.0.1", "brandon", "admin", "it490");
                                print_r($request).PHP_EOL;
                                //$query = $db->real_escape_string($request['query']);
                                $query = $request['query'];
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
                        $recipe_info = array();
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

                                $title = $arr['title'];
                                $url = $arr['spoonacularSourceUrl'];
                                $id = $arr['id'];
                                //$imageType = $arr['imageType'];
                                $imageUrl = "https://spoonacular.com/recipeImages/$id-240x150.jpg";
                                //$calories = $arr['nutrition']['nutrients'][0]['amount'];
                                //$vegetarian = $arr['vegetarian'];
                                //$vegan = $arr['vegan'];
                                //$gluten = $arr['glutenFree'];
                                //$dairy = $arr['dairyFree'];

                                $recipe_info[$i]['title'] = $title;
                                $recipe_info[$i]['url'] = $url;
                                $recipe_info[$i]['imageUrl'] = $imageUrl;
				$recipe_info[$i]['id'] = $id;
				SendToLogger("Getting recipe info $i");
				SendToLogger(implode($recipe_info[$i]));
                        }
                        var_dump($recipe_info);
                        return $recipe_info;

        }
}


function doDmzTransaction($request){
	$client = new rabbitMQClient("testRabbitMQ.ini", "dmzServer");
	SendToLogger("Sending request to DMZ");
	echo "Sending request to DMZ".PHP_EOL;
	$response = $client->send_request($request); //First we get the information from api
	SendToLogger("Received request from DMZ");
	SendToLogger(implode($response));
	echo "Received response from DMZ".PHP_EOL;
	for($i = 0; $i < 3; $i++){
                var_dump($response[$i], true);
	}
	SendToLogger("Before Database Transaction");
	$db_response = doDatabaseTransaction($response); //Then send information to database
	SendToLogger("Successfully stored recipes in database");
	//SendToLogger(implode($db_response));
        return $db_response;
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }

  SendToLogger("Rabbit " . $request['message']);

  switch ($request['type'])
  {
    case "Login":
        return doLogin($request['username'],$request['password']);
    case "Register":
        return doRegisterUser($request['username'], $request['password']);
   case "Logout":
        return doLogoutUser($request['username'], $request['password']);
   case "Database":
	   $output = doDatabaseTransaction($request);
	   if($output == '-1'){
		echo "Failed login".PHP_EOL;
	   }
	   return $output;
   case "DMZ":
        return doDmzTransaction($request);
   default:
         break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
SendToLogger("Rabbit Machine Start");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
SendToLogger("Rabbit Machine shutdown");
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
