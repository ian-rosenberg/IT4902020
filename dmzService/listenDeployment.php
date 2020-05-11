#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//require_once('sendDisLog.php');

function SearchForNewPackage(){
        exec("ls /home/ubuntu/IT4902020/packages/", $files);

        $newestVersion = 0;
        $newPackage = "";
        for($i = 0; $i < count($files); $i++){
                $file = explode('.', $files[$i]);
                $version = $file[1];
                if($version > $newestVersion){
                        $newPackage = $files[$i];
                        $newestVersion = $version;
                }
        }
        return $newPackage;
}

function UnloadPackage($packageToUnload){
        echo "Trying to unload $packageToUnload".PHP_EOL;
        exec("mv /home/ubuntu/IT4902020/packages/$packageToUnload /home/ubuntu/IT4902020/dmzService");
        exec("tar -xzf /home/ubuntu/IT4902020/dmzService/$packageToUnload -C /home/ubuntu/IT4902020/dmzService");
        exec("rm /home/ubuntu/IT4902020/dmzService/$packageToUnload");
        //shell_exec("rm /home/ubuntu/git/it490/packages/$packageToUnload");
}


function GetPackageByVersionNumber($version){

        exec("ls /home/ubuntu/IT4902020/packages/ | grep $version.", $packageArray);
        var_dump($packageArray);
        shell_exec("mv /home/ubuntu/IT4902020/packages/$packageArray[0] /home/ubuntu/IT4902020/dmzService");
        shell_exec("tar -xzf /home/ubuntu/IT4902020/dmzService/$packageArray[0] -C /home/ubuntu/IT4902020/dmzService");
        shell_exec("rm /home/ubuntu/IT4902020/dmzService/$packageArray[0]");
        //shell_exec("rm packages/$packageArray[0]");

}


function requestProcessor($request){

        switch($request['type']){

        case "update":
                $package = SearchForNewPackage();
                UnloadPackage($package);
                echo "Unpacked Files".PHP_EOL;
                //var_dump($request);
                return 1;
        case "service":
                $command = $request['command'];
                //$service = $request['service'];
                exec("sudo systemctl $command rot13.service", $output);
                echo "System $command".PHP_EOL;
                return $output;
        case "rollback":
                echo "Hello".PHP_EOL;
                echo $request['version'];
                GetPackageByVersionNumber($request['version']);
                return 1;
        default:
                return "Got bad command";
        }
}

$server = new rabbitMQServer("testRabbitMQ.ini", "listenDeployment");
echo "Now listening for messages".PHP_EOL;
$server->process_requests('requestProcessor');

?>
