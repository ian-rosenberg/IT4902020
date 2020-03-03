<?php
if (isset($_GET['query']) && $_GET['query'] != '') {
  $url = 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/quickAnswer';
  $query_fields = [
          'autoCorrect' => 'true',
          'pageNumber' => 1,
          'pageSize' => 10,
          'safeSearch' => 'false',
          'q' => $_GET['query']
  ];
  $curl = curl_init($url . '?' . http_build_query($query_fields));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'X-RapidAPI-Host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
		'X-RapidAPI-Key: 93c57b326fmsh48524f99f98556ap124d28jsnbed3adeb2dbf',
  ]);
  $response = json_decode(curl_exec($curl), true);
  curl_close($curl);
  $news = $response['value'];



?>