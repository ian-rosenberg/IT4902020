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
									 <a class='nav-link' active href='profilePage.php'>My Profile</a>
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


    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5"><?php echo $_SESSION['user']."'s profile"?></h2>
          <p class="lead"></p>
        </div>
        <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0; color: black;">
	  BMI:
                        <?php
                                if(!empty($_SESSION['bmi'])){
                                        echo $_SESSION['bmi'] + "<br>";
					echo "<a href='bmicalc.php'>Re-Calculate your BMI!</a><br>";
                                }
                                else{
                                        echo "<a href='bmicalc.php'>Calculate your BMI!</a><br>";
                                }
				if(!empty($_SESSION['bmr'])){
                                        echo $_SESSION['bmr'] + "<br>";
                                        echo "<a href='calbudget.php'>Re-Calculate your BMR</a><br>";
                                }
                                else{
                                        echo "<a href='calbudget.php'>Calculate your BMI!</a><br>";
                                }

                        ?>

	</div>
      </div>
      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Another headline</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
      </div>
    </div>
	
	<div class="text-center" id="RecipeResponse">
		
	</div>
</body>
</html>
