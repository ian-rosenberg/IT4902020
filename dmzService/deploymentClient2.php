#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('package.php.inc');


function GetLatestFileVersion($files){

        $newestVersion = 0;
        for($i = 0; $i < count($files); $i++){
                $file = explode('.', $files[$i]);
                $version = $file[1];
                if($version > $newestVersion){
                        $newestVersion = $version;
                }
        }
        return $newestVersion;
}

$filesArray = Package::CONSTANT;
$filesString = "";
for($i = 0; $i < count($filesArray); $i++){
        $filesString .= $filesArray[$i] . ' ';
}

exec("ls packages", $output);

$fileName = "DMZPackage.1.+.tar.gz";
$latestVersion = 1;
if(!empty($output)){


        $latestVersion = GetLatestFileVersion($output);
        $latestVersion++;
        $fileName = "DMZPackage." . $latestVersion . ".+.tar.gz";
}

exec("tar -czf " . $fileName . " " . $filesString, $output, $return_val);
exec("mv $fileName packages/");
exec("scp packages/$fileName ubuntu@10.0.1.40:~/git/IT4902020/deployment/DMZ");

$client = new rabbitMQClient("testRabbitMQ.ini","brandonServer");

$request = array();
$request['type'] = "update";
$request['server'] = "DMZ";
$request['version'] = $latestVersion;

$response = $client->send_request($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;
