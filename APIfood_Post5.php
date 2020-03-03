<?php
// food API url
$url = 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/cuisine';

//collection object
$data=[
	'collection' => 'RapidAPI'
];

// Initializes a new cURL session
$curl = curl_init($url);

// 1. Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 2. Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

// 3. Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

// 4. Set custom headers for RapidAPI Auth and Content-Type header
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
  'X-RapidAPI-Key: 93c57b326fmsh48524f99f98556ap124d28jsnbed3adeb2dbf',
  'Content-Type: application/x-www-form-urlencoded'
]);

// Execute cURL request with all previous settings
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);
echo $response . PHP_EOL;

?>

