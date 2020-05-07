#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

echo "Starting update for front-end".PHP_EOL;

exec("ls -t | head -1  ../packages", $output);

$filename = "frontendPackage.";
$version = "1";

if(!empty($output))
{
        $exploded = explode('.', $output[0]);

	$version = $exploded[1];

	$version += 1;
}

$filename = $filename . "." . $version;


echo "Current version: ". $version.PHP_EOL;

exec("tar -czvf $filename.tar.gz /home/ubuntu/git/IT4902020/WebServer", $output, $return_val);
exec("mv  $filename.tar.gz ..packages/");
exec("scp ../packages/$filename.tar.gz ubuntu@10.0.1.40:~/git/IT4902020/deployment/frontEnd/");

print_r($output);

$client = new rabbitMQClient("testRabbitMQ.ini","brandonServer");

$request = array();
$request['type'] = "update";
$request['server'] = "rabbitMQ";
$request['version'] = $version;

$response = $client->send_request($request);

echo "client received response: ".PHP_EOL;

print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
