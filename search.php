<?php
	require_once "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Δελτία Τύπου</title>
</head>
<body>
	<?php
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
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
			<center><h2 class="page-header">Αναζήτηση Πληροφοριών</h2></center>
			<hr>
			<form method="POST" action="search.php" style="display: flex;">
					<input type="text" class="form-control" name="q" placeholder="πχ 250" />
					<input type="submit" name="search" class="btn btn-primary" value="Αναζήτηση" />
			</form>
			<?php
				if(isset($_POST['search']))
				{
				   mysqli_set_charset($link, "utf8");
					$q = $_POST['q'];
					
					$sql = "SELECT * FROM line WHERE code LIKE '$q%'";
					$result = mysqli_query($link, $sql);
					if ($result != "") 
					{
						while($row = mysqli_fetch_assoc($result))
						{
							echo "Τύπος: ".$row['transportation_type'];
							echo "<br>";
							echo "Στάσεις: ".$row['number_of_stops'];
							echo "<br>";
							echo "Αφετηρία: ".$row['starting_point_stop_id'];
							echo "<br>";
							echo "Τέρμα: ".$row['destination_stop_id'];
							echo "<br>";
							if($row['is_circular'] == 1)
								echo "Κυκλική διαδρομή: ΝΑΙ";
							else
								echo "Κυκλική διαδρομή: ΟΧΙ";
						}
					}
					else
					{
						echo "Κανένα Αποτέλεσμα";  
					}
				}
				$link->close();
			?>
			</div>
		<div class="col-lg-3"></div>
	</div>
</body>
</html>