#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');

echo "Now Listening for Updates".PHP_EOL;

function UpdateFiles($version)
{
	exec("tar -C . -zxvf ../packages/frontEndPackage.$version.+.tar.gz");
        exec("sudo chmod +x frontend.service");
        exec("sudo chmod 777 frontend.service");

	exec("sudo cp frontend.service /etc/systemd/system");

	exec("sudo systemctl daemon-reload");
	exec("sudo systemctl enable frontend.service");
	exec("sudo systemctl start frontend.service");

}

function RollbackVersion()
{
	exec("ls -t ../packages | head -2", $output);

	if(count($output) < 2)
	{
		echo "Cannot rollback, nothing to rollback to";
		return;
	}

	$version = $output[1][1]; 

	echo "Rolling back from version $version";

	return;

	$filename = "frontendPackage.$version.+.tar.gz";
	echo "Rolling back to most recent, good backup";

        exec("mv listenUpdate.php ../");

        $badfile = str_replace("+", "-", $filename);
        exec("mv ../packages/$filename ../packages/$badfile");

	return;

	exec("rm -r *");

	UpdateFiles($version);
}

function requestProcessor($request)
{

	switch($request['type'])
	{
        	case 'update':
			echo "Received Update".PHP_EOL;
        		UpdateFiles($request['version']);
			break;

		case 'rollback':
			RollbackVersion();
			break;
	}
}

$server = new rabbitMQServer("testRabbitMQ.ini", "brandonServer");

$server->process_requests('requestProcessor');

?>
