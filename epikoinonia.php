<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Παράπονα</title>
</head>

<body>
  <div style="height: 100vh;">
	<?php
	// Initialize the session
	session_start();
	// Check if the user is logged in, if not then show logoutmenu
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		include 'menu.php';
	}
	else
	{
		include 'menuLoggedIn.php';
	}
	?>
    <div style="height: 100%;">
	<br>
	<div class="row">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
			<h2>Αποστολή Παραπόνων</h2>
			<hr>
			<form action="mailto:someone@example.com" method="post" enctype="text/plain">
			Όνομα:<br>
			<input type="text" name="name"><br>
			Τηλέφωνο:<br>
			<input type="tel" name="tel"><br>
			Email:<br>
			<input type="text" name="mail"><br>
			Παράπονο:<br>
			<input type="text" name="comment" size="50"><br><br>
			<input type="submit" value="Αποστολή">
			<input type="reset" value="Reset">
			</form>
		</div>
		<div class="col-lg-3">
		</div>
	</div>	
	<br>
	<br>
	<br>
<br><br><br><br><br><br>
	<h2>Τηλέφωνο Επικοινωνίας : 210-1234812</h2></center><hr>

<br>
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>