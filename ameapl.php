<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
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
    <div style="padding: 5px;">
      <h4 style="margin: 5px 0px;">
        Ειδικές Πληροφορίες σχετικά με τη χρήση των ΜΜΜ από τα άτομα με ειδικές ανάγκες
      </h4>
      <div style="font-size: 14px;">
       Κατάλληλα ενημερωμένο προσωπικό βρίσκεται σε σταθμούς για βοήθεια . Πληροφορίες για την επικοινωνία και ώρες λειτουργείας : 210-1110943
      </div>
      <h4 style="margin: 5px 0px;">
        Κάρτα
      </h4>
      <div style="font-size: 14px;">
         Για αγορά ηλεκτρονικής κάρτας θα πρέπει να κάνετε ηλεκτρονικά την αίτηση και να περιμένετε παραλαβή από courier
      </div>
      <h4 style="margin: 5px 0px;">
        Σταθμοί
      </h4>
      <div style="font-size: 14px;">
        Όλοι οι σταθμοί που βρίσκονται στο κέντρο της Αθήνας και των βορειών προαστίων είναι προσβασιμοί από αμέα .Για επιπλέον πληροφορίες παρακαλώ επικοινωνίστε .
        </label>
        Η παραλαβή των απωλεσθέντων γίνεται κατά τις εργάσιμες ημέρες εκτός
        Τετάρτης και από τις 08:00 – 16:00 από τα γραφεία της εταιρείας,
        Κρατίνου 9 & Αθηνάς, Αθήνα.
      </div>
    </div>
  </body>
</html>
