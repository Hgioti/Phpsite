<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Αποτελέσματα</title>
  </head>
  <body>
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
	<div class="row">
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<center>
					<h5>Αναζήτηση Βέλτιστης Διαδρομής</h5>
					<form method="post" action="results-and-map.php"> 
							<input type="text" name="start_point" placeholder="Αφετηρία">
							<input type="text" name="end_point" placeholder="Τέρμα">
							<button>Αναζήτηση</button>
					</form>
				</center><br>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
  </body>
  <?php include 'footer.php'; ?>
</html>
