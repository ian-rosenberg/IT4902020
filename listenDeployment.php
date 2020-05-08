#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//require_once('sendDisLog.php');

function SearchForNewPackage(){
        exec("ls packages", $files);

        $newestVersion = 0;
        $newPackage = "";
        for($i = 0; $i < count($files); $i++){
                $file = explode('.', $files[$i]);
                $version = $file[1];
                if($version > $newestVersion){
                        $newPackage = $files[$i];
                }
        }
        return $newPackage;
}

function UnloadPackage($packageToUnload){
        shell_exec("cp packages/$packageToUnload .");
require_once('handleUsers.php.inc');
        shell_exec("tar -xzf $packageToUnload");
        shell_exec("rm $packageToUnload");
}

function requestProcessor($request){

        switch($request['type']){

        case "update":
                $package = SearchForNewPackage();
                UnloadPackage($package);
                echo "Unpacked Files";
                return 1;
        default:
                return "Got bad command";
        }
}

$server = new rabbitMQServer("testRabbitMQ.ini", "brandonServer");
echo "Now listening for messages".PHP_EOL;
$server->process_requests('requestProcessor');

?>

