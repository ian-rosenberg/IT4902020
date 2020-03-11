<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once("sendToLogger.php");

class APIAccess
{
	private $client;

	public function __construct()
	{
		$client = new rabbitMQClient("testRabbitMQ.ini","apiServer");
	}	

	function SendRandomRecipeToClient($request)
	{
		$resp = $this->client->send_request($request);
		
		$resp .= PHP_EOL;
		
		echo $resp;
		
		sendToLogger($resp);
		
		return $resp;
	}
}
?>
