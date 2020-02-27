<? php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT490 - SFW</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="jumbotron text-center">
		<h1>IT490 - SFW</h1>
	</div>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">IT490 - SFW</a>
		</div>
		<ul class="nav navbar-nav">
		  <li class="active"><a href><strong>Home</strong></a></li>
		  <li><a href="loginPage.php">Login</a></li>
		  <li><a href="registerPage.php">Register</a></li>
		</ul>
	  </div>
	</nav>
	
	<div class="text-center" id="textResponse">
		
	</div>


</body>
</html>
