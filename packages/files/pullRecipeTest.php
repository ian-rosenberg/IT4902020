#MOVE TO DMZ

<?php	
require_once("testClient.php.inc");

$comma = "%252Cd";
$url = "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random?number=1";

if( !empty($_POST['foodTag']))
{
	$tags = explode(',', $_POST['foodTag']);
	
	$url .= "&tags=";
	
	foreach($tag as $tags)
	{
		if(end($tags) != $tag)
		{
			$url .= $tag.$comma;
		}
		else{
			$url .= $tag;
		}
	}
}

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
		"x-rapidapi-key: 121607682cmsh2a3a276639a2519p11fb8bjsn875259b25ff8"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	file_put_contents("TestRecipes.txt", $response);
}

?>
