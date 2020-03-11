#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('handleApi.php.inc');

function requestProcessor($request)
{
  $response = "";
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "RandomRecipeGet"
      return GetRandomRecipeFromServer($request);
	 default:
	  break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed.".PHP_EOL/"Response: ".$response);
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
 
