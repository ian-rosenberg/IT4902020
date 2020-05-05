#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('package.php.inc');


$filesArray = Package::CONSTANT;
$filesString = "";
for($i = 0; $i < count($filesArray); $i++){
	$filesString .= $filesArray[$i] . ' ';
}

$fileName = "rabbitMQPackage.2.0.tar.gz";
exec("tar -czf " . $fileName . " " . $filesString, $output, $return_val);
exec("mv $fileName packages/");
exec("scp packages/$fileName ubuntu@10.0.1.40:~/git/IT4902020/deployment/rabbitMQ");

exec("ls packages", $output);

print_r($output);

$client = new rabbitMQClient("testRabbitMQ.ini","brandonServer");

$request = array();
$request['type'] = "update";
$request['server'] = "rabbitMQ";
$request['message'] = "Hey Brandon";
print($request['message']);
$response = $client->send_request($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
