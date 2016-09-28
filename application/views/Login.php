<!DOCTYPE html>
<html>
<head>
	<title>e-Comix Login</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/login.css">
</head>
<body>
	<center><h1>e-Comix: The Best Exotic Comic Books Collection</h1>
	<h2>Please Login or Register for Free!</h2></center>
	<div id="wrapper">
		<div id="register">
			<form class="register" action="/Login/register" method="POST">
				<fieldset>
					<legend><h3>Register</h3></legend>
<?php		
			if($this->session->flashdata("registration_messages")) {
				echo $this->session->flashdata("registration_messages");
			}
?>
					<table>
						<tbody>
							<tr><td><label for="first_name">First Name:</label></td><td><input type="first_name" name="first_name"></td></tr>
							<tr><td><label for="last_name">Last Name:</label></td><td><input type="last_name" name="last_name"></td></tr>
							<tr><td><label for="email">Email:</label></td><td><input type="email" name="email"></td></tr>
							<tr><td><label for="password">Password:</label></td><td><input type="password" name="password"></td></tr>
							<tr><td id="password">* Password should be at least 8 characters</td></tr>
							<tr><td><label for="confirm_password">Confirm Password:</label></td><td><input type="password" name="confirm_password"></td></tr>
						</tbody>
					</table>
							<input class="button" type="submit" value="Register">
						
				</fieldset>
			</form>
		</div>
		<div id="login">
			<form class="register" action="/Login/userLogin" method="POST">
				<fieldset>
					<legend><h3>Login</h3></legend>
<?php		
			if($this->session->flashdata("login_errors")) {
				echo $this->session->flashdata("login_errors");
			}
?>
					<table>
						<tbody>
							<tr><td><label for="email">Email:</label></td><td><input type="email" name="email"></td></tr>
							<tr><td><label for="password">Password:</label></td><td><input type="password" name="password"></td></tr>
						</tbody>
					</table>
					<input class="button" type="submit" value="Login">
				</fieldset>
			</form>
		</div>			

		
	</div>
</body>
</html>