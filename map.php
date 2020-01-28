<?php
$start_point = $_REQUEST['start_point'] ;
$end_point = $_REQUEST['end_point'] ;

require_once "includes/config.php";
$sql = $link->query("SELECT * from search_route WHERE starting_point LIKE '$start_point%'");

$row = $sql->fetch_row();
$routeId = $row[0];
$routeDuration = $row[3]; 
$routeDistance = $row[4]; 
$routeCost = $row[5]; 
$routeSteps = $row[6]; 
$map = $row[7];

$sql = "SELECT directions from step WHERE search_route_id = '$routeId'";
$result = mysqli_query($link, $sql);

if ($link->error) {
    die($link->error);
}
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
		<div class="col-lg-5">
			<center>
				<h5>Επιλέξατε Προορισμό:</h5>
				<iframe width="100%" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $end_point?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				<br>
				<h5>Διαδρομή με τα ΜΜΜ:</h5>
				<iframe width="100%" height="400" id="gmap_canvas" src="<?php echo $map ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				<br>
				<a target="_blank" href="https://www.google.com/maps/dir/<?php echo $start_point?>/<?php echo $end_point?>/">Άνοιγμα διαδρομής με αυτοκίνητο</a>
			</center>
		</div>
		<div class="col-lg-1"></div>
		<div class="col-lg-6">
		<h5>Πληροφορίες Διαδρομής:</h5><br>
		<ul>
			<li>Χρόνος διαδρομής: <?php echo $routeDuration; ?> λεπτά</li>
			<li>Απόσταση διαδρομής: <?php echo $routeDistance; ?> μέτρα</li>
			<li>Κόστος εισιτηρίου: <?php echo $routeCost; ?> ευρώ</li>
			<li>Βήματα που πρέπει να γίνουν: <?php echo $routeSteps; ?></li>
		</ul>
		
		<ol>
		<?php
			while($stepRow = mysqli_fetch_assoc($result))
			{
				echo "<li>".$stepRow["directions"]."</li>";
			}
			$link->close();
		?>
		</ol>
		</div>
	</div><br>
  </body>
   <?php include 'footer.php'; ?>
</html>
