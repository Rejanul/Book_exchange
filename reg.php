<?php include('server.php')?>

<!DOCTYPE html>
<html>
	<head>
		<title>Registation Form</title>
		<link rel="stylesheet" href="stylereg.css"/>
	</head>
	<style>
	body{
  background-image: url('bg.jpg');
}
	</style>
	<body>
<form method="post" action="reg.php">
<h2 style="color:blue;">Register Form</h2>
<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" placeholder="Username" name="username">
</div>

<div class="input-container">
  <i class="fa fa-envelope icon"></i>
  <input class="input-field" type="text" placeholder="Email" name="email">
</div>

<div class="input-container">
  <i class="fa fa-phone icon"></i>
  <input class="input-field" type="tel" placeholder="Phone" name="phone">
</div>

<div class="input-container">
  <i class="fa fa-key icon"></i>
  <input class="input-field" type="text" placeholder="Depertment" name="department">
</div>


<div class="input-container">
  <i class="fa fa-key icon"></i>
  <input class="input-field" type="password" placeholder="Password" name="password1">
</div>

<div class="input-container">
  <i class="fa fa-key icon"></i>
  <input class="input-field" type="password" placeholder="Confirm Password" name="password2">
</div>

<button type="submit" class="btn" name="reg_user">Register</button>


<p>
  	<h3>	Already a member? <a href="login.php">Sign in</a> </h3>
  	</p>

</form>

	</body>

</html>
