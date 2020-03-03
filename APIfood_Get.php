<?php

$url = 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/quickAnswer';
$collection_name = 'RapidAPI';
$request_url = $url . '/' . $collection_name;

//checking data
$data = [
  'public_write' => true
];


$curl = curl_init($request_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'X-RapidAPI-Host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
  'X-RapidAPI-Key: 93c57b326fmsh48524f99f98556ap124d28jsnbed3adeb2dbf',
  'Content-Type: application/json'
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response . PHP_EOL;

?>