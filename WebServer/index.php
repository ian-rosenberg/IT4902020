<?php
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
	
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link active" href="#">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="loginPage.php">Login</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="registerPage.php">Register</a>
			</li>
			<?php
				if(!empty($_SESSION['user']))
				{	
					if($_SESSION['user'] != "guest")
					{	
						echo("<li class='nav-item'>
									 <a class='nav-link' href='logout.php'>Logout</a>
								 </li>
								  </ul>
								 </nav>");	
					}
					else
					{
						echo("<li class='nav-item'>
							<a class='nav-link disabled' href='logout.php'>Logout</a>
						 </li>
						 </ul>
						</nav>");				
					}
				}	
				else
				{
					echo("<li class='nav-item'>
							<a class='nav-link disabled' href='logout.php'>Logout</a>
						 </li>
						 </ul>
						</nav>");			
				}		
		
			if(!empty($_SESSION['user']))
			{	
				if($_SESSION['user'] != 'guest')
				{
					echo ("<br><br><div class='text-center'>Welcome, ".$_SESSION['user']."!</div><br><br>".PHP_EOL);
				}
				else
				{
					echo ("<br><br><div class='text-center'>Welcome, guest!</div><br><br>".PHP_EOL);
				}
			}
			else
			{
				echo ("<br><br><div class='text-center'>Welcome, guest!</div><br><br>".PHP_EOL);
			}
	?>
	
</body>
</html>
