#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('handleUsers.php.inc');
//require_once('sendDisLog.php');

function doDatabaseTransaction($request){
  $client = new rabbitMQClient("testRabbitMQ.ini","dbServer");
  $response = $client->send_request($request);
  return $response;
}

function doUpdate($request){
	$client = new rabbitMQClient("testRabbitMQ.ini", $request['server']);

}

function doRollback($request){

}

function doService($service, $server){
	return exec("sudo systemctl $service $server");
}

function recentVersion($dir){
	exec("ls $dir", $list);
	$other = 0;
	for($i = 0; $i < count($list); $i++){
		$explode = explode(".", $list[$i]);
		$version = $explode[1];
		if($version > $other){
			$other = $version;
		}
	}
	exec("ls $dir | grep $other", $output);
	return $output[0];
}

function goodFiles($dir){
	exec("ls $dir | grep '+'", $list);
        $other = 0;
        for($i = 0; $i < count($list); $i++){
                $explode = explode(".", $list[$i]);
                $version = $explode[1];
                if($version > $other){
                        $other = $version;
                }
        }
        exec("ls $dir | grep $other.+", $output);
        return $output[0];
}

function versionNum($dir){
	exec("ls $dir | grep '+'", $list);
        $other = 0;
        for($i = 0; $i < count($list); $i++){
                $explode = explode(".", $list[$i]);
                $version = $explode[1];
                if($version > $other){
                        $other = $version;
                }
        }
        return $other;
}

function deleteFile($dir){
	exec("ls $dir | grep '+'", $list);
	$other = 0;
	$output = "";
        for($i = 0; $i < count($list); $i++){
                $explode = explode(".", $list[$i]);
		$version = $explode[1];
		if($version > $other){
			$other = $version;
		}
		if($other-- == $version){
			$output = shell_exec("ls $dir | grep $other.'+'");
		}
	}
	shell_exec("cd $dir");
	return shell_exec("rm $output");
	//return $output;
}

print_r(deleteFile("frontEnd"));

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }

  //SendToLogger("Deployment " . $request['message']);

  switch ($request['type'])
  {
  	case "update":
	  	//update to most recent version
		$client = null;
		switch ($request['server'])
		{
			case "rabbitMQ":
				$client = new rabbitMQClient("testRabbitMQ.ini", "rabbitMQ.prod");
				$fileName = recentVersion("rabbitMQ/");
				$path = "rabbitMQ/$fileName ubuntu@10.0.1.216:~/git/it490/packages";
				//$client->send_request($request);
				break;
			case "frontEnd":
				$client = new rabbitMQClient("testRabbitMQ.ini", "frontEnd.prod");
				$fileName = recentVersion("frontEnd/");
				$path = "frontEnd/$fileName ubuntu@10.0.1.142:~/git/IT4902020/packages";
				//$client->send_request($request);
				break;
			case "DMZ":
				//$client = new rabbitMQClient("testRabbitMQ.ini", "DMZ.prod");
				$fileName = recentVersion("DMZ");
				$path = "DMZ/$fileName ubuntu@10.0.1.something: something";
				break;
			default:
				break;
		}
		shell_exec("scp " .$path);
		$client->send_request($request);
		return "Successfully received and sent";
	case "rollback":
		//if version is bad, go back to most recent good version
		$client = null;
		switch ($request['server'])
                {
                        case "rabbitMQ":
                                $client = new rabbitMQClient("testRabbitMQ.ini", "rabbitMQ.prod");
				
				$version = versionNum("rabbitMQ/");
				$versionFile = "rabbitMQ/rabbitMQPackage.$version.+.tar.gz";
				$versionPath = "rabbitMQ/$versionFile ubuntu@10.0.1.216:~/git/it490/packages";

				$fileName = parseFiles("rabbitMQ/");
                                $path = "rabbitMQ/$fileName ubuntu@10.0.1.216:~/git/it490/packages";
                                break;
                        case "frontEnd":
                                $client = new rabbitMQClient("testRabbitMQ.ini", "frontEnd.prod");
				
				$version = versionNum("frontEnd/");
				$versionFile = "frontEnd/frontEndPackage.$version.+.tar.gz";
				$versionPath = "frontEnd/$versionFile ubuntu@10.0.1.142:~git/IT4902020/packages";
				break;
                        case "DMZ":
                                $client = new rabbitMQClient("testRabbitMQ.ini", "DMZ.prod");

				$version = versionNum("DMZ/");
				$versionFile = "DMZ/DMZPackage.$version.+.tar.gz";
				$versionPath = "DMZ/$versionFile ubuntu@something:something";
				break;
                        default:
                                break;
                }
		shell_exec("scp " .$versionPath);
		return "no";
	case "service":
		//Deployment controls systemd service
		switch ($request['server'])
		{
			case "rabbitMQ":
				$client = new rabbitMQClient("testRabbitMQ.ini", "rabbitMQ.prod");
				break;
			case "frontEnd":
				$client = new rabbitMQClient("testRabbitMQ.ini", "frontEnd.prod");
                                break;	
			case "DMZ":
				$client = new rabbitMQClient("testRabbitMQ.ini", "DMZ.prod");
                                break;
			default:
				break;
		}
		$response = $client->send_request($request);
		return $response;
   	default:
   		break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","deployment");
//SendToLogger("Deployment Machine Start");
//echo "deployment BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
//SendToLogger("Deployment Machine shutdown");
//echo "deployment END".PHP_EOL;
exit();
?>
