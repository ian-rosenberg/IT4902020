#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('package.php.inc');
require_once('sendDisLog.php');

SendToLogger("Starting update for front-end".PHP_EOL);
echo "Starting update for front-end".PHP_EOL;

$filesArray = Package::CONSTANT;
$filesString = "";
for($i = 0; $i < count($filesArray); $i++){
        $filesString .= $filesArray[$i] . ' ';
}

exec("ls packages", $output);

$filename = "frontendPackage.1";
$version = "1";

if(!empty($output))
{
        $filename = $output[count($output)-1];

	$fileVersion = explode('.', $filename);

	$version = (int)$fileVersion[1];
	$version += 1;

	$filename = $fileVersion[0] . "." . $version;
}

SendToLogger("Current version: ". $version.PHP_EOL);
echo "Current version: ". $version.PHP_EOL;

exec("tar -czvf $filename.tar.gz /home/ubuntu/git/IT4902020/WebServer", $output, $return_val);
exec("mv  $filename.tar.gz packages/");
exec("scp packages/$filename.tar.gz ubuntu@10.0.1.40:~/git/IT4902020/deployment/frontEnd/");

print_r($output);
SendToLogger($output);

$client = new rabbitMQClient("testRabbitMQ.ini","brandonServer");

$request = array();
$request['type'] = "update";
$request['server'] = "rabbitMQ";
$request['version'] = $version;

$response = $client->send_request($request);

echo "client received response: ".PHP_EOL;
SendToLogger("client received response: ".PHP_EOL);

print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
SendToLogger($argv[0]." END".PHP_EOL);

