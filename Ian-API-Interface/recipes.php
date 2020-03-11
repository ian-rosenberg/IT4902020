<?php
require_once('../rabbitMQLib.inc');
require_once("../sendDisLog.php");

class APIAccess
{
	private $client;

	public function __construct()
	{
		$client = new rabbitMQClient("testRabbitMQ.ini","apiServer");
	}		

	public function GetRandomRecipeFromServer($filename, $title, $url)
	{
		$ar = new array("type" => "RandomRecipeGet",
		"filename" => $filename,
		"title" => $title,
		"url" => $url);
		
		$this->client->connect($ar);
	}

	public function SaveImage($img, $path)
	{
		$ch = curl_init ($img);
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1 );
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		
		$rawData = curl_exec($ch);
		
		curl_close($ch);
		
		if(file_exists($path))
		{
			unlink($path);
		}
		
		$f = fopen($path, 'x');
		fwrite($f, $rawData);
		fclose($f);
		
		return $path.$img;
	}

	public function GetRandomRecipes($tags, $num)
	{
		$comma = "%252C";
		$tagField = "&tags=";
		
		$url = "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random?number=".$num;
		
		if(strstr($tags, ',') and !empty($tags))
		{		
			$tagsExploded = explode(',', $tags);
						
			if(count($tagsExploded))
			{
				$url .= $tagField;
			}
						
			foreach($tag  as $tagsExploded)
			{
				if($tag == end($tagsExploded))
				{
					$url = $url . $tag;
				}
				else
				{
					$url = $url . $tag . $comma;
				}
			}
		}
		
		echo($url);

		sendToLogger("using $url");
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"x-rapidapi-host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com",
				"x-rapidapi-key: 121607682cmsh2a3a276639a2519p11fb8bjsn875259b25ff8",
				"Content-Type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err.PHP_EOL;
		} else {
			sendToLogger($response);
			
			return $response;
		}
	}
}

$api = new APIAccess();
$response = "";

if(!empty($argv))
{
	$response = $api->GetRandomRecipes(implode(',',array_slice($argv, 2)), $argv[1]);
}
else
{
	$response = $api->GetRandomRecipes("", 1);	
}

sendToLogger($response.PHP_EOL.PHP_EOL);

$json =json_decode($response, true);

$img = $json['recipes'][0]['image'];
$imgName  = $json['recipes'][0]['title'];
$recipeURL = $json['recipes'][0]['spoonacularSourceUrl'];

sendToLogger($img.PHP_EOL.PHP_EOL);
		 
$saveResponse = $api->SaveImage($img, "RecipeIcons/".$imgName);

if(!empty($saveResponse))
{
	sendToLogger("Saved image ".$img.PHP_EOL);
	
	SendRandomRecipeToServer($img, $imgName, $recipeURL);
}
else
{
	sendToLogger("Failed to save image ". $img.PHP_EOL);
}
?>
