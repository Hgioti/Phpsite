<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Αρχική Σελίδα</title>
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
	echo "<style> body { background-image: url(\"https://img.wallpapersafari.com/desktop/1920/1080/98/79/6xyfEu.jpg\"); } </style>";
	?>


    <div style="height: 100%;">
	<br>
	<div class="row">
		<div class="col-lg-3">
			<center><h2>Ανακοινώσεις</h2></center><hr>
			<font color="white">
			THE BUS LINE Χ80 PIRAEUS- AKROPOLIS- SYNTAGMA (EXPRESS) IS RE-LAUNCHED ON WEDNESDAY, MAY 8, 2019.

Athens Urban Transport Organization announces the re-launch of the EXPRESS bus line X80 PIRAEUS-AKROPOLIS-SYNTAGMA, on Wednesday, May 8, 2019, having as goal to serve, in the best possible way, both passengers and visitors travelling to Athens.

The express bus line X80 route, will link OLP cruise terminal in Piraeus (Xaveriou Coast and Miaouli Coast) with the historic area of Acropolis, the Stavros Niarchos Foundation Cultural Centre (SNFCC) as well as the centre of Piraeus with the centre of Athens.

The bus line X80 covers, round route, in about 60 minutes, a 27 km distance, meaning that, in just 30 minutes the passengers can get to Athens city centre from the Port of Pireaus, and vice versa. It has 16 bus stops, displaying several locations of particular tourist interest in Piraeus and Athens, such as the Acropolis Museum, the Piraeus Archaeological Museum, the Planetarium, the Piraeus Municipal Theater, the National Museum of Contemporary Art and the Stavros Niarchos Foundation Cultural Centre (SNFCC).

Indicatively, the bus line X80 stops at OLP both cruise terminal gates, at Piraeus city centre, “Neo Faliro” and “Syggrou-Fix” Metro stations, Acropolis area and Syntagma square, having also separate points of embarkation-disembarkation for the passengers.

The express bus line offers, also, transfer possibilities:

a. to central Metro stations ("Syggrou –Fix”, “Syntagma” and “Neo Faliro”)

b. to bus lines X96 (from Piraeus) and X95 (from Athens, Syntagma square) with direction to the Athens International Airport “Eleftherios Venizelos”.

X80 bus service is executed on a daily basis, every 30 minutes, from 7:00 am to 9:15 pm (departing from the Xaveriou coast terminal station).

Valid tickets for the X80 bus line are:

    Daily Ticket for all public transport means at € 4,50

</font>

			
		</div>
		<div class="col-lg-6">
			<center><h2>Καλωσορίσατε στην ιστοσελίδα του OASA</h2></center><hr>

			<div class="row">
		<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<center>
					<h5>Αναζήτηση Βέλτιστης Διαδρομής</h5>
					<form method="post" action="map.php"> 
							<input type="text" name="start_point" placeholder="Αφετηρία">
							<input type="text" name="end_point" placeholder="Τέρμα">
							<button>Αναζήτηση</button>
												</form>
				</center><br>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>

			</div>
		<div class="col-lg-3">
		</div>
	</div>	
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>