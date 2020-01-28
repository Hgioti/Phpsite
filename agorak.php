<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta charset="UTF-8" />



    <title>Αγορά</title>
  </head>

  <body>
	<?php include 'menu.php'; 
	echo "<style> body { background-image: url(\"https://img.wallpapersafari.com/desktop/1920/1080/98/79/6xyfEu.jpg\"); } </style>";?>
	<!-- Η φόρμα αρχίζει εδώ -->

	<form method="post" action="done/thankyou_agora.php"> 
		<div class="form-group col-lg-6 col-xs-12">                                
			<input type="text" name="name"  placeholder="Όνομα Κατόχου*"  required>
		</div>

		<div class="form-group col-lg-6 col-xs-12">                                
			<input type="text" name="odos"  placeholder="Διεύθυνση Κατοικίας*"  required>
		</div>

		<div class="form-group col-lg-6 col-xs-12">
			<input type="tel" name="tel" placeholder="Τηλέφωνο*" required>
		</div>

		<div class="form-group col-lg-6 col-xs-12">
			<input type="email" name="email_address" placeholder="Email*" required>
		</div>

		<div class="form-group col-lg-6 col-xs-12">
			<input type="number" name="payCard" placeholder="Πιστωτική/Χρεωστική κάρτα*" required>


		</div>

		<div class="form-group col-lg-12 col-xs-12">

			<select name='packet'>
			<option value="0" disabled="" selected="" style="display:none;">Επιλογή Πακέτου</option>
			<option>1 Διαδρομή - 2€</option>
			<option>10 Διαδρομές - 15€</option>
			<option>30 Διαδρομές - 30€</option>
			<option>100 Διαδρομές - 50€</option>
			</select>
		</div>
		<div class="form-group col-lg-12 col-xs-12">
			<textarea name="comments" maxlength="500" placeholder="Αν θέλετε αφήνετε κάποιο σχόλιο"></textarea>
		</div>
		<div class="form-group col-lg-12 col-xs-12">
			<button>Φόρτιση Κάρτας</button>
		</div>
	</form>
	


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<font color="white"><h2>Επιπλέον</h2></center><hr>
			Πληροφορίες για την έκδοση κάρτας σε φυσικό σημείο .<br>
			Πληροφορίες για ομάδες με μειωμένα κόμιστρα .
  </body>
</html>