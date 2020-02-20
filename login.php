<?php
if(array_key_exists("username" ,$_POST) && array_key_exists("password", $_POST))
{
	echo("Array keys exist!");
	
	$user = mysqli_real_escape_string($_POST["username"]);
	$pass = mysqli_real_escape_string($_POST["password"]);

	$mysqli = new mysqli('192.168.10.3', 'david', 'admin', 'it490');//Change to mysql db ip
	
	if($mysqli->connect_errno){
		echo("Could not connect to db! ".$mysqli->connect_errno."\n");
	}
	else{
		$sql = "select * from login where user = '".user."' and password = '".pass."'";
	
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

echo(var_dump($_POST));
console.log(var_dump($_POST));
echo($_POST["username"]);
echo($_POST["password"]);
?>
