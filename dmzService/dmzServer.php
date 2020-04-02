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
		CURLOPT_URL => "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/mealplans/generate?timeFrame=day&targetCalories=2000&diet=vegan&exclude=olives",
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
	} 
	else {
		echo $response;
	}	

	$recipesid = getRecipeid(json_decode($response, true));
	$recipes = getRecipes($recipesNames);
		
	return($recipes);
}

function getRecipeid($recipes){
	
	$recipeid = array();
	$index = 0;
	for($i = 0; $i < 3; $i++) {
		$recipeid[$i] = $recipes['meals'][$i]['id'];
	}
	
	return $recipeid;
}

function getRecipes($recipeid){
	
	$recipes = array();
	
	for($i=0; $i < 2; $i++){
		
		$id = $recipeid[$i];
		$curl_url= "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/$id/information?includeNutrition=false", 
			
		curl_setopt_array($curl, array(
		CURLOPT_URL => $curl_url,
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
		} 
		else {
			recipes[$i] = $response;
		}
	}
}

#Second parameter must match info from testRabbitMQ.ini
$server = new rabbitMQServer("testRabbitMQ.ini", "dmzServer");

$server->process_requests('requestProcessor');

?>
