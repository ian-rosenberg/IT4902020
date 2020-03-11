<?php
	require_once("recipeClient.php.inc");
	
	$recipeClient = new RecipeClient();
	$tags= trim($_POST["user"]);

	$response = $recipeClient->client->GetRandomRecipe($tags);

	echo ("script>
		document.getElementById('RecipeResponse').innerHTML += <div class='col-9 text-center'>".
				"<div class='col-3'><img src='".$response['filename']."'/>
					</div>
				<div class='col-3'>".$response['title'].
					"</div>
				<div class='col-3'><a href='".$response['url']."'>Recipe Link</a>
					</div>
			</div>;
	</script>";

	 exit
?>
