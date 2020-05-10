#!/usr/bin/php
<?php

require_once('rabbitMQLib.inc');
require_once('path.inc');
require_once('get_host_info.inc');

echo "Now Listening for Updates".PHP_EOL;

function UpdateFiles($version)
{
        print_r( "VERSION: ".$version.PHP_EOL);

        exec("tar -C . -zxvf /home/ubuntu/git/IT4902020/packages/frontEndPackage.$version.+.tar.gz");
        exec("sudo chmod +x frontend.service");
        exec("sudo chmod 777 frontend.service");

        exec("sudo cp frontend.service /etc/systemd/system");

        exec("sudo chmod +x frontendLogger.service");
        exec("sudo chmod 777 frontendLogger.service");

        exec("sudo cp frontendLogger.service /etc/systemd/system");

        exec("sudo systemctl enable frontendLogger.service");
        exec("sudo systemctl start frontendLogger.service");
        exec("sudo systemctl enable frontend.service");
        exec("sudo systemctl start frontend.service");
        exec("sudo systemctl daemon-reload");
}

function RollbackVersion()
{
        exec("ls -t ../packages", $output);

        if(count($output) < 2)
        {
                echo "Cannot rollback, nothing to rollback to";
                return;
        }

        $version = $output[1][1];

        echo "Rolling back from version $version";

        $filename = "frontendPackage.$version.+.tar.gz";
        echo "Rolling back to most recent, good backup";

        exec("mv listenUpdate.php ../");

        $badfile = str_replace("+", "-", $filename);
        exec("mv ../packages/$filename ../packages/$badfile");

        exec("rm -r *");

        UpdateFiles($version);
}

function requestProcessor($request)
{

        switch($request['type'])
        {
                case 'update':
                        print_r("Received Update");
                        UpdateFiles($request['version']);
                        break;

                case 'rollback':
                        print_r("Received Rollback Request");
                        RollbackVersion();
                        break;
        }
}

$server = new rabbitMQServer("testRabbitMQ.ini", "brandonServer");

$server->process_requests('requestProcessor');

?>
