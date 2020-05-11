#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function GetPackageByVersionNumber($version){

        exec("ls packages/ | grep $version.", $packageArray);
        shell_exec("mv packages/$packageArray[0] .");
        shell_exec("tar -xzf $packageArray[0]");
        shell_exec("rm $packageArray[0]");
        //shell_exec("rm packages/$packageArray[0]");

}

$client = new rabbitMQClient("testRabbitMQ.ini","brandonServer");

$request = array();
$request['type'] = "rollback";
$request['server'] = "rabbitMQ";

$response = $client->send_request($request);
var_dump($response);
//GetPackageByVersionNumber($response);

?>
