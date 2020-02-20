<?php
if(isset($_POST["username"]) && isset($_POST["password"]))
{
	$mysqli = new mysqli('127.0.0.1', 'root', 'admin', 'it490');//Change to mysql db ip
	
	if($mysqli->connect_errno){
		echo("Could not connect to db! ".$mysqli->connect_errno."\n");
	}
	else{
		$sql = "select * from login where user = '".$_POST["username"]."' and password = '".$_POST["password"]."'";
	
		if(!$result = $mysqli->query($sql))
		{
			echo("Failed to execute query ".$mysqli->errno." ".$mysqli->error);
		}
		else
		{
			if($result->num_rows === 0)
			{
				echo("No credential match!");
			}
			else
			{
				echo("Successful login!");
			}
		}
	}
}
else
{
	echo("Credentials not specified.");
}

/*if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET, POLITELY FUCK OFF";
	echo json_encode($msg);
	exit(0);
}
$request = $_POST;
$response = "unsupported request type, politely FUCK OFF";
switch ($request["type"])
{
	case "login":
		$response = "login, yeah we can do that";
	break;
}
echo json_encode($response);
echo(var_dump($_POST);
exit(0);*/

?>
