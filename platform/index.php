<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Φόρτιση Εισιτηρίου</title>

  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--<link rel="stylesheet" type="text/css" href="../css/buttons.css">-->

</head>

<body>

<?php include '../menuLoggedIn.php'; ?>


  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Καλωσόρισες <?php echo $_SESSION["username"] ?></h1>
		<hr>
		  <div class="btn-group-vertical">
			<button type="button" class="btn btn-lg buttonstyle"><a class="nav-link" href="edit.php">Επεξεργασία των στοιχείων μου</a></button>
			<button type="button" class="btn btn-lg buttonstyle"><a class="nav-link" href="fortisi.php">Φόρτιση Κάρτας</a></button>
			<button type="button" class="btn btn-lg buttonstyle"><a class="nav-link" href="reset.php">Αλλαγή κωδικού</a></button>
		  </div>
		</div>
    </div>
  </div>
  <?php include '../footer.php'; ?>
</body>

</html>