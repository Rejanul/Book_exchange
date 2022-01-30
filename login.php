<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Form</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div id="wrapper">
			<div class="heading"><h2>LOGIN</h2></div>
			<div class="form-wrapper">
				<form action="login.php" method="post">
				<?php include('errors.php'); ?>
					<label for="username">Username:</label>
					<input type="text" required name="username">
					<br/><br/>

					<label for="password">Password:</label>
					<input type="password" required name="password">
					<br/><br/>


					<label for="department">DEPARTEMNT:</label>
					<select>
						<option selected>-- Optional --</option>
						<option>EEE</option>
						<option>CSE</option>
						<option>ME</option>
						<option>IBA</option>
						<option>BBA</option>
					</select>
				
					<br/><br/><br/>

					<div class="loginreset">
						<input type="submit" value="Login" name = "login_user">
						<input type="reset" value="Reset">
					</div>
					<div>
					<br/><br/><br/>
					
  		<h3>Not yet a member? <a href="reg.php">Sign up</a></h3>
  	</div>
				</form>
			</div>
		</div>

	</body>
</html>
