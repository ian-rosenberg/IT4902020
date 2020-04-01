<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="UTF-8">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
	document.GetElementById("button").setAttribute('disabled', true);
</script>

</head>

<body>
	<div class="jumbotron text-center">
		<h1>Login</h1>
	</div>

	<nav class="navbar navbar-expand-md bg-primary navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" href="#">Login</a>
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
								 <li class='nav-item'>
									 <a class='nav-link' href='profilePage.php'>My Profile</a>
								 </li>
								  </ul>
								 </nav>");	
					}
					else
					{
						echo("<li class='nav-item'>
							<a class='nav-link disabled' href='logout.php'>Logout</a>
						 </li>
						 <li class='nav-item'>
							<a class='nav-link disabled' href='profilePage.php'>My Profile</a>
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
						 <li class='nav-item'>
							<a class='nav-link disabled' href='profilePage.php'>My Profile</a>
						</li>
						 </ul>
						</nav>");			
				}	
		
			if(!empty($_SESSION['user']))
			{	
				echo ("<br><br><div class='text-center'>Welcome, ".$_SESSION['user']."!</div><br><br>".PHP_EOL);
			}
			else
			{
				echo ("<br><br><div class='text-center'>Welcome, guest!</div><br><br>".PHP_EOL);
			}
	?>

	<script>
		function ValidateForm() {
	 		var form = document.forms["loginForm"];
			var pw = form["password"];
			var un = form["username"];
			var b = document.getElementById("button");
			var flag = 0;

  			if (un.value == "") {
    				un.style.background = "red";
				document.getElementById("errUN").innerHTML = "Enter a username!";
				b.disabled = true;
			}
			else
			{
				un.style.background = "white";
				document.getElementById("errUN").innerHTML = "";
				b.disabled = false;
			}

			if (pw.value == "") {
                               	pw.style.background = "red";
				document.getElementById("errPW").innerHTML = "Enter a password!";
                        	b.disabled = true;
			}
			else
			{
				pw.style.background = "white";
				document.getElementById("errPW").innerHTML = "";
				b.disabled = false;
			}
			
			return;
		}
	</script>

	<div class="container-sm">
		<div class="text-center">
			<form name = "loginForm" method="POST" action="login.php">
				<label for="username">Username:</label>
				<input type="text" id="username" name ="username" onblur="ValidateForm()" aria-required="true" data-ok="false">
				<span style = "color:red;" id ="errUN"></span>
				<br>
				<br>
				<label for="password">Password:</label>
				<input type="password" id="password" name ="password" onblur="ValidateForm()" aria-required="true" data-ok="false">
				<span style = "color:red;" id ="errPW"></span>
				<br>
				<br>
				<button type="submit" id="button" disabled>Login</button>
			</form>
		</div>
	</div>

	<div class="container-sm">
		<div id = "textResponse" class="text-center">
				
		</div>
	</div>

</body>
</html>
