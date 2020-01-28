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


		</h1></Τελευταία Νέα</h1>
<p>14.01.20 Μερική προσωρινή τροποποίηση της λεωφορειακής γραμμής 101 λόγω έργων στο Δήμο Αλίμου.
14.01.20 Μερική προσωρινή τροποποίηση της λεωφορειακής γραμμής 162 στο Δήμο Βάρης – Βούλας – Βουλιαγμένης.
14.01.20 Προσωρινή Τροποποίηση της Διαδρομής της Λεωφορειακής Γραμμής 891.
31.12.19 Λειτουργία ΜΜΜ την Παραμονή Πρωτοχρονιάς 31-12-2019
30.12.19 Μεταβολές λεωφορειακών γραμμών λόγω έντονων καιρικών φαινομένων.
24.12.19 Λειτουργία των Λεωφορειακών Γραμμών 242, 250 και Ε90.
20.12.19 Λειτουργία ΜΜΜ κατά την εορταστική περίοδο Χριστουγέννων - Πρωτοχρονιάς 2019-2020.
19.12.19 Προσωρινή Τροποποίηση της Διαδρομής των Λεωφορειακών Γραμμών 725, 726 και Α10.
18.12.19 Προσωρινή Τροποποίηση της Διαδρομής των Λεωφορειακών Γραμμών 700, 747, Α11 και Β11. 

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