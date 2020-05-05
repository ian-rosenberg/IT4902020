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
function HandleLoginResponse(response)
{
 var text = JSON.parse(response);
 document.getElementById("textResponse").innerHTML = "response: "+text+"<p>";
}

function SendLoginRequest()
{
	var request = new XMLHttpRequest();
	
	var un = document.getElementById("username").value;
	var pw = document.getElementById("password").value;
	
	request.open("POST","login.php",true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.onreadystatechange= function ()
	{
		console.log("Ready state " + this.readyState);
		console.log("Status " + this.status);
		
		
		HandleLoginResponse(this.responseText);
			
		document.getElementById("textResponse").text = this.responseText;
		
	};
		
	request.onerror= function()
	{
		document.getElementById("textResponse").value = "Failure!";
	};
	
	request.onload = function () {
		console.log("Loaded");
	};
	request.send("uname="+un+"&pword="+pw);	
}
</script>

</head>

<body>
	<div class="jumbotron text-center">
		<h1>Login</h1>
	</div>

	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
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
	<div class="container-sm">
		<div class="text-center">
			<form name = "loginForm" method="POST" action="login.php" onsubmit="SendLoginRequest()">
				<label for="username">Username:</label>
				<input type="text" id="username" name ="username">
				<br>
				<br>
				<label for="password">Password:</label>
				<input type="password" id="password" name ="password" >
				<br>
				<br>
				<input type="submit" id="button" value="Login">
			</form>
		</div>
	</div>

	<div class="container-sm">
		<div id = "textResponse" class="text-center">
				
		</div>
	</div>

</body>
</html>
