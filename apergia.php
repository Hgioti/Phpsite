<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Ιστορία</title>
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
		<div class="col-lg-3"></div>
		<div class="col-lg-6">


		</h1></ΑΔΕΔΥ. Απεργία την Παρασκευή 10 Ιανουαρίου 2020</h1>
<p>
Απεργιακή κινητοποίηση για τους εργαζόμενους 5.500 πτυχιούχους, ηλικίας 22-29 ετών του Ειδικού Προγράμματος Απασχόλησης του ΟΑΕΔ

Η Εκτελεστική Επιτροπή της ΑΔΕΔΥ κηρύσσει εικοσιτετράωρη απεργιακή κινητοποίηση την Παρασκευή, 10 Ιανουαρίου 2020, για τους εργαζόμενους του Ειδικού Προγράμματος Απασχόλησης του Οργανισμού Απασχόλησης Εργατικού Δυναμικού (ΟΑΕΔ) – για 5.500 πτυχιούχους, ηλικίας 22-29 ετών, καθώς και διευκολυντική στάση εργασίας από τις 11:00 π.μ. έως τη λήξη του ωραρίου για τις Ομοσπονδίες που έχουν εργαζόμενους σε αυτά τα προγράμματα.

Όπως αναφέρεται σε σχετική ανακοίνωση, η Εκτελεστική Επιτροπή της ΑΔΕΔΥ αγωνίζεται για μόνιμη και σταθερή δουλειά για όλους στο δημόσιο και στον ιδιωτικό τομέα, ενώ είναι ενάντια στις απολύσεις και στις ελαστικές σχέσεις εργασίας.
<p>
</ul>  
		</p>
		</div>
		<div class="col-lg-3"></div>
	</div>	
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>