#!/usr/bin/php
<?php

require_once('/home/ubuntu/git/IT4902020/WebServer/rabbitMQLib.inc');

echo "Now Listening for Updates".PHP_EOL;

function UpdateFiles($version)
{
        print_r( "VERSION: ".$version.PHP_EOL);

	exec("sudo chmod 777 /home/ubuntu/git/IT4902020/packages/frontEndPackage.$version.+.tar.gz");
        
        exec("sudo tar -C /home/ubuntu/git/IT4902020/packages/files -zxvf /home/ubuntu/git/IT4902020/packages/frontEndPackage.$version.+.tar.gz");
        exec("sudo cp /home/ubuntu/git/IT4902020/packages/files/* /home/ubuntu/git/IT4902020/WebServer");

	exec("sudo cp /home/ubuntu/git/IT4902020/WebServer/*.php /var/www/490sfw.com");
	exec("sudo cp /home/ubuntu/git/IT4902020/WebServer/*.htaccess /var/www/490sfw.com");
	exec("sudo cp /home/ubuntu/git/IT4902020/WebServer/*.inc /var/www/490sfw.com");
	exec("sudo cp /home/ubuntu/git/IT4902020/WebServer/*.json /var/www/490sfw.com");
	exec("sudo systemctl reload apache2");
}

function requestProcessor($request)
{

        switch($request['type'])
        {
                case 'update':
                        echo "Received Update".PHP_EOL;
                        UpdateFiles($request['version']);
                        return 1;

		case 'service':
			$command = $request['command'];
                	$service = $request['service'];
                	exec("sudo systemctl $command frontend.service", $output);
			exec("sudo systemctl reload apache2");
                	echo "System $command".PHP_EOL;
                	return $output;

                case 'rollback':
                        echo "Received Rollback Request".PHP_EOL;
                        UpdateFiles($request['version']);
                        return 1;

                default: return 0;
        }
}

$server = new rabbitMQServer("testRabbitMQ.ini", "brandonServer");

$server->process_requests('requestProcessor');

?>

