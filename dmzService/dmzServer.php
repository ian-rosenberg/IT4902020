#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');

echo "Now Listening for rabbitMQ messages".PHP_EOL;


function requestProcessor($request)
{
	#RETURN WHATEVER NEEDS TO BE SENT TO RABBITMQ
		$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/mealplans/generate?targetCalories=2000&timeFrame=day",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"x-rapidapi-host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com",
			"x-rapidapi-key: 121607682cmsh2a3a276639a2519p11fb8bjsn875259b25ff8"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}

	$recipesNames = getRecipeNames(json_decode($response, true));
	$recipes = getRecipes($recipesNames);
		
	return($recipes);
}

function getRecipeNames($recipes){

	$recipeNames = array();
	$index = 0;
	for($i = 0; $i < 3; $i++) {
		$recipeNames[$i] = $recipes['meals'][$i]['title'];
	}
	
	return $recipeNames;
}

function getRecipes($recipeName){

}

#Second parameter must match info from testRabbitMQ.ini
$server = new rabbitMQServer("testRabbitMQ.ini", "dmzServer");

$server->process_requests('requestProcessor');




?>
