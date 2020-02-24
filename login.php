<?php
	session_start();
	
	require_once("testClient.php.inc");
	
	
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
	
	
	if(array_key_exists("username" ,$_POST) &&
	 array_key_exists("password", $_POST) &&
	 array_key_exists("type", $_POST))
	{
		$user = $_POST["username"].trim();
		$pass = $_POST["password"].trim();
		$sessionType  = $_POST["type"].trim();

		$_SESSION["user"] = $user;
		
		$_SESSION["loggedIn"] = "true";
		
		if($sessionType == "logout")
		{
			$_SESSION["loggedIn"] = "false";
		}


		$client = new Client();
		$response = $client->Connect($user, $pass, $sessionType);
		
		console_log("This is this server's response: ".$response);

		switch($response)
		{
			case "1"://login
				$response = $response." login";
				break;
			
			case "2"://logout
				$response = $response."  logout";
				break;
		
			case "3"://registration
				$response = $response." registered";
				break;	
		}
	}
?>