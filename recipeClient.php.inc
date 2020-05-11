<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
Class RecipeClient {

	private $client;
	
	public function __construct() {
		$client = new rabbitMQClient("testRabbitMQ.ini","apiServer");
	}

	public function GetRandomRecipe($tags) {
		if(!$this->client){
			return "Did not get new client";
		}
		$request = array();
		$request['type'] = "RandomRecipeGet";
		$request['tags'] = $tags;

		$response = $client->send_request($request);
		
		return json_encode($response);
	}

}
?>
