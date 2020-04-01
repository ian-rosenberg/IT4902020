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
	
	<nav class="navbar navbar-expand-md bg-primary navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link active" href="index.php">Home</a>
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
								 </li>");	
								 
						echo("<li class='nav-item'>
									 <a class='nav-link' active' href='profilePage.php'>My Profile</a>
								 </li>
								  </ul>
								 </nav>");	
					}
					else
					{
						echo("<li class='nav-item'>
							<a class='nav-link disabled' href='logout.php'>Logout</a>
						 </li>");				
						
						echo("<li class='nav-item'>
									 <a class='nav-link disabled'  href='profilePage.php'>My Profile</a>
								 </li>
								  </ul>
								 </nav>");	
					}
				}	
				else
				{
					echo("<li class='nav-item'>
							<a class='nav-link disabled' href='logout.php'>Logout</a>
						 </li>");		

					echo("<li class='nav-item'>
									 <a class='nav-link disabled'  href='profilePage.php'>My Profile</a>
								 </li>
								  </ul>
								 </nav>");	
				}				
		?>
		<div class="text-center">
		<?php
			if(!empty($_SESSION['user']))
			{	
				if($_SESSION['user'] != 'guest')
				{
					echo ("<br><br><div>Welcome, ".$_SESSION['user']."!</div><br><br>".PHP_EOL);
				}
				else
				{
					echo ("<br><br><div>Welcome, guest!</div><br><br>".PHP_EOL);
				}
			}
			else
			{
				echo ("<br><br><div>Welcome, guest!</div><br><br>".PHP_EOL);
			}
		?>
		</div>
	<div class="row">
	 <div class="col-3 text-center">
		<h1>
			<?php echo $_SESSION['user']."'s profile"?>
		</h1>
		<div>
			BMI:
			<?php 
				if(!empty($_SESSION['bmi'])){
					echo $_SESSION['bmi'];
				}
				else{
					echo "<a href='bmicalc.php'>Calculate your BMI!</a>";
				}
			?>
		</div>
		<div>
			BMR: 
			<?php 
				if(!empty($_SESSION['bmr'])){
					echo $_SESSION['bmr'];
				}
				else{
					echo "<a href='calbudget.php'>Calculate your BMR!</a>";
				}
			?>
		</div>
		<div class = "text-center" id = "RecipeResponse">
			
		</div>
	  </div>
	
	
	<div class = "col-6 text-center">
		<div class="row">
			<ul>
				<li>
					<a href="restriction.php">Add Restrictions</a>
				</li>
			</ul>
		</div> 
	</div>
	</div class="row">
	
	<div class="text-center" id="RecipeResponse">
		
	</div>
</body>
</html>
