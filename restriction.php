<?php
session_start();
require_once("testClient.php.inc");
?>

<?php
if(isset($_POST['subdata']) && ($_POST['subdata']) == "Submit"){
	extract($_POST);

	if($restriction != 'pick'){
		$un = trim($_SESSION['user']);
		$id = trim($_SESSION['userID']);
		$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
		$request = array();
		$request['username'] = $un;
		$request['type'] = 'Database';
		$request['queryType'] = 'update';
		$request['query'] = "update restrictions set $restriction = 1 where id = $id";
		$request['message'] = "Updating restriction";
		$response = $client->send_request($request);
		if($response){
			$result = "Successfully inserted restriction";
		}
		else{
			$result = "Could not insert restriction";
		}
	}
	else{
		$result = "Select a restriction";
	}	
}

?>

<?php
	if(isset($_POST['remdata']) && ($_POST['remdata']) == "Remove"){
		extract($_POST);

		if($restriction != 'pick'){
			$un = trim($_SESSION['user']);
			$id = trim($_SESSION['userID']);
			$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
			$request = array();
			$request['username'] = $un;
			$request['type'] = 'Database';
			$request['queryType'] = 'update';
			$request['query'] = "update restrictions set $restriction = 0 where id = $id";
			//$request['query'] = "SELECT * from restrictions";
			$request['message'] = "Happy Birthday Brandon";
			$response = $client->send_request($request);
			if($response){
				$result = "Successfully deleted restriction";
			}
			else{
				$result = "Could not insert restriction";
			}
		}
		else{
			$result = "Select a restriction";
		}
	
}
?>
<!DOCTYPE html>
<html>
        <head>
                <title>BMI Calculator</title>
                <link rel="stylesheet" type="text/css" href="bmicalcstyle.css" />
        </head>

        <body>
                <h2> Restriction </h2>
                <div class="restrictions">
                        <form id="restrictForm" name="restrictForm" method="post">
				Restrictions: <select name="restriction">
					<option value="pick">Pick A Restriction</option>
					<option value="vegetarian">Vegetarian</option>
					<option value="glutenFree">Gluten</option>
					<option value="dairyFree">Dairy Free</option>
					<option value="vegan">Vegan</option>
					</select><br /><br />

				<input type="submit" name="subdata" id="subdata" class="btn" value="Add"/><br /><br />

				<input type="submit" name="remdata" id="remdata" class="btn" value="Remove"><br /><br />
				Result: <?php if(!empty($restriction))
						{
							echo $result;

							sleep(3);

							header("Location: profilePage.php");
						}
					?> 
                        </form>
		</div>
        </body>
</html>
<?
