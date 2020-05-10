#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini", "brandonServer");

echo "Starting update for front-end".PHP_EOL;

exec("ls -t ../packages | head -1", $output);

$filename = "frontEndPackage.";
$version = "1";

if(!empty($output))
{
        $exploded = explode('.', $output[0]);

	$version = $exploded[1];

	$version = (int)$version + 1;
}

$filename .= $version;


echo "Current version: ". $version.PHP_EOL;

exec("touch $filename.+.tar.gz");
exec("tar -czf $filename.+.tar.gz --exclude='frontEndDeployment.php $filename* rollback.php testRabbitMQ.ini' .", $output, $return_val);
exec("mv  $filename.+.tar.gz ../packages/$filename.+.tar.gz");

exec("scp ../packages/$filename.+.tar.gz ubuntu@10.0.1.40:~/git/IT4902020/deployment/frontEnd", $output);


$request = array();
$request['type'] = "update";
$request['server'] = "frontEnd";
$request['version'] = $version;

$response = $client->send_request($request);

echo "client received response: ".PHP_EOL;

print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;

?>
