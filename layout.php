<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div style="display: flex;flex-direction: column;height: 100vh;">
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
            content

        </div>
        <footer>
            <div style="height: auto;background: rgb(110, 87, 64);display: flex;color: #ffffff;flex-wrap: wrap;">
                <div style="display:flex;flex: 7;height: 100%;flex-wrap: wrap;">
                    <div style="display: flex;flex-direction: column ;padding: 20px 5px;">
                        <a href="#" style="color: grey;">
                            Αγορά Κάρτας
                        </a>
                        <a href="#" style="color: grey;">
                            Φόρτιση Κάρτας
                        </a>
                        <a href="#" style="color: grey;">
                            Μέσα
                        </a>
                        <a href="#" style="color: grey;">
                            Βέλτιστη Διαδρομή
                        </a>
                        <a href="#" style="color: grey;">
                            Πληροφόρηση
                        </a>
                    </div>
                    <div style="display: flex;flex-direction: column ;padding: 20px;;">
                        <a href="#" style="color: grey;">
                            Aπωλεσθέντα
                        </a>
                        <a href="#" style="color: grey;">
                            Αμέα
                        </a>
                        <a href="#" style="color: grey;">
                            Δελτία τύπου
                        </a>
                        <a href="#" style="color: grey;">
                            Δρομολόγια
                        </a>
                        <a href="#" style="color: grey;">
                            Προκυρήξεις
                        </a>
                    </div>
                    <div style="display: flex;flex-direction: column ;padding: 20px;;">
                        <a href="#" style="color: grey;">
                            Ιστορία
                        </a>
                        <a href="#" style="color: grey;">
                            Διοικητική Δομή
                        </a>
                        <a href="#" style="color: grey;">
                            Καταστατικό
                        </a>
                        <a href="#" style="color: grey;">
                            Εταιρείες Ομίλου
                        </a>
                        <a href="#" style="color: grey;">
                            Οργανόγραμμα
                        </a>
                    </div>
                    <div style="display: flex;flex-direction: column ;padding: 20px;;">
                        <a href="#" style="color: grey;">
                            Παράπονα
                        </a>

                    </div>
                </div>
                <div style="flex:1;display: flex;justify-content: center;padding: 20px; ">
                    <h4>Download our App OASA Telematics</h4>
                </div>
            </div>
            <div style="display: flex;height: 70px;padding:10px;justify-content: space-between;flex-wrap: wrap;">
                <div style="display: flex;align-items: center;justify-content: center;">
                    <a href="#" style="color:rgb(52,58,64);padding: 5px;font-size: 14px;font-weight: bold;">
                        Συχνές
                        ερωτήσεις
                    </a>
                    <a href="#" style="color:rgb(52,58,64);padding: 5px;font-size: 14px;font-weight: bold;">

                        Όροι χρήσης
                    </a>
                    <a href="#" style="color:rgb(52,58,64);padding: 5px;font-size: 14px;font-weight: bold;">
                        Πολιτική
                    </a>
                </div>
                <div style="display: flex;align-items: center;">
                    <div style="height: 100%; display: flex;align-items: center;">
                        <i class="fa fa-facebook"
                            style="font-size:25px;padding: 0 5px;cursor:pointer;color: darkblue;"></i>
                    </div>
                    <div style="height: 100%; display: flex;align-items: center;">
                        <i class="fa fa-youtube-play"
                            style="color:red;font-size:25px;padding: 0 5px;cursor:pointer;"></i>
                    </div>
                    <div style="height: 100%; display: flex;align-items: center;">
                        <i class="fa fa-instagram"
                            style="font-size:25px;padding: 0 5px;cursor:pointer;color: darkviolet;"></i>
                    </div>
                    <div style="height: 100%; display: flex;align-items: center;">
                        <h4 style="padding: 0px 5px;color:rgb(52,58,64) ;margin-top: 6px;">© OASA 2020</h4>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>