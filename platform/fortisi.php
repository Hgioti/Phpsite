<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
require_once "../includes/config.php";
$myid = $_SESSION['id'];
$thankyou_msg = "";
mysqli_set_charset($link, "utf8");

//get some information
$sql = $link->query("SELECT diadromes, card, purchases FROM users WHERE id = $myid");
$row = $sql->fetch_row();
$countDiadromes = $row[0];
$cardNumber = $row[1];
$sinoloAgorwn = $row[2];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$diadromes_err ="";

    // Validate client
    if(empty(trim($_POST["diadromes"])))
    {
        $diadromes_err = "Πρόβλημα κατά την αγορά, δοκιμάστε πάλι αργότερα.";
    }
    else
    {
        $diadromes = trim($_POST["diadromes"]);
    }

    // Check input errors before updating the database
    if(empty($diadromes_err))
    {
        // Prepare an update statement
        $sql = "UPDATE users SET diadromes=diadromes+$diadromes, purchases=purchases+1 WHERE id=$myid";

		if ($link->query($sql) === TRUE) {
                //header("location: thankyou.php");
			$thankyou_msg =
			'
			<div class="col-lg-12">
				<div class="card text-center">
				  <div class="card-header">
					Μόλις Αγοράστηκε
				  </div>
				  <div class="card-body">
					<h5 class="card-title">Νέο Πακέτο:</h5>
					<p class="card-text">Περιλαμβάνει '.$diadromes.' διαδρομές!</p>
					<p class="card-text">Κάρτα χρέωσης: '.$cardNumber.'</p>
					<a href="fortisi.php" class="btn btn-primary">Αγόρασε περισσότερες διαδρομές</a>
				  </div>
				  <div class="card-footer text-muted">
					Ιδιοκτήτης εισιτηρίου: '.$_SESSION["fullname"].'
				  </div>
				</div>
				<br>
			</div>
			';
		} else {
			echo "Σφάλμα: " . $link->error;
		}
    }
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Φόρτιση Εισιτηρίου</title>

  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/pricetables.css">

</head>

<body>
<?php include '../topMenuLoggedIn.php'; ?>
  <!-- Navigation -->
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">OASA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Προφίλ</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="fortisi.php">Φόρτιση</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Αποσύνδεση</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Διαδικασία online φόρτισης κάρτας</h1>
		<hr>
		<?php echo $thankyou_msg ?>
		<div class="row">
			<div class="col-lg-3">
				<div class="card">
				  <div class="card-header">
					Πληροφορίες Χρήστη
				  </div>
				  <ul class="list-group list-group-flush">
					<li class="list-group-item">Όνομα: <?php echo $_SESSION["fullname"] ?></li>
					<li class="list-group-item">Username: <?php echo $_SESSION["username"] ?></li>
					<?php
						$sql = $link->query("SELECT diadromes purchases FROM users WHERE id = $myid");
						$row = $sql->fetch_row();
						$countDiadromes = $row[0];
					?>
					<li class="list-group-item">Εναπομείναντες Διαδρομές: <?php echo $countDiadromes ?></li>
					<li class="list-group-item">Συνολικές Αγορές: <?php echo $sinoloAgorwn ?></li>
					<li class="list-group-item">Κάρτα Χρέωσης: <?php echo $cardNumber ?></li>
				  </ul>
				</div>
			</div>
			<div class="col-lg-9">
				<!-- Plans -->
				<section id="plans">
					<div class="container">
						<div class="row">
							<!-- item -->
							<div class="col-md-3 text-center">
								<div class="panel panel-danger panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-ticket"></i>
										<h3>1<br>διαδρομή</h3>
									</div>
									<div class="panel-body text-center">
										<p><strong>2€</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-check"></i> Προσωποποιημένη Κάρτα</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Online Ανανέωση</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Χρονικό όριο διαδρομής: 90 λεπτά</li>
									</ul>
									<div class="panel-footer">
										<form style="color: #fff; margin-bottom:0px;" action="fortisi.php" method="post"><input type="hidden" name="diadromes" value="1"/><button class="btn btn-lg btn-block btn-success" type="submit">Απευθείας Αγορά</button></form>
									</div>
								</div>
							</div>
							<!-- /item -->

							<!-- item -->
							<div class="col-md-3 text-center">
								<div class="panel panel-danger panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-ticket"></i>
										<h3>10 διαδρομές</h3>
									</div>
									<div class="panel-body text-center">
										<p><strong>15€</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-check"></i> Προσωποποιημένη Κάρτα</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Online Ανανέωση</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Χρονικό όριο διαδρομής: 90 λεπτά</li>
									</ul>
									<div class="panel-footer">
										<form style="color: #fff; margin-bottom:0px;" action="fortisi.php" method="post"><input type="hidden" name="diadromes" value="10"/><button class="btn btn-lg btn-block btn-success" type="submit">Απευθείας Αγορά</button></form>
									</div>
								</div>
							</div>
							<!-- /item -->

							<!-- item -->
							<div class="col-md-3 text-center">
								<div class="panel panel-warning panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-ticket"></i>
										<h3>30 διαδρομές</h3>
									</div>
									<div class="panel-body text-center">
										<p><strong>30€</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-check"></i> Προσωποποιημένη Κάρτα</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Online Ανανέωση</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Χρονικό όριο διαδρομής: 90 λεπτά</li>
									</ul>
									<div class="panel-footer">
										<form style="color: #fff; margin-bottom:0px;" action="fortisi.php" method="post"><input type="hidden" name="diadromes" value="30"/><button class="btn btn-lg btn-block btn-success" type="submit">Απευθείας Αγορά</button></form>
									</div>
								</div>
							</div>
							<!-- /item -->

							<!-- item -->
							<div class="col-md-3 text-center">
								<div class="panel panel-success panel-pricing">
									<div class="panel-heading">
										<i class="fa fa-ticket"></i>
										<h3>100 διαδρομές</h3>
									</div>
									<div class="panel-body text-center">
										<p><strong>50€</strong></p>
									</div>
									<ul class="list-group text-center">
										<li class="list-group-item"><i class="fa fa-check"></i> Προσωποποιημένη Κάρτα</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Online Ανανέωση</li>
										<li class="list-group-item"><i class="fa fa-check"></i> Χρονικό όριο διαδρομής: 90 λεπτά</li>
									</ul>
									<div class="panel-footer">
										<form style="color: #fff; margin-bottom:0px;" action="fortisi.php" method="post"><input type="hidden" name="diadromes" value="100"/><button class="btn btn-lg btn-block btn-success" type="submit">Απευθείας Αγορά</button></form>
									</div>
								</div>
							</div>
							<!-- /item -->

						</div>
					</div>
				</section>
				<!-- /Plans -->
			</div>
		</div>
      </div>
    </div>
  </div>
  <?php include '../footer.php'; ?>
</body>

</html>