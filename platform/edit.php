<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

// Include config file
require_once "../includes/config.php";

if (isset($_SESSION['id'])) {
	$myid = $_SESSION['id'];
	//Get user data
	$get_user = $link->query("SELECT fullname, card FROM users WHERE id = '$myid'");
	$user_data_row = $get_user->fetch_row();
	$userDataCard = $user_data_row[0];
	$userDataFullname = $user_data_row[1];
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = $fullname = $card = $done_message = "";
$username_err = $password_err = $confirm_password_err = $fullname_err = $card_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate fullname
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Παρακαλώ δώστε ονοματεπώνυμο.";
    } elseif(strlen(trim($_POST["fullname"])) < 2){
        $fullname_err = "Το ονοματεπώνυμο πρέπει να έχει τουλάχιστον 2 χαρακτήρες.";
    } else{
        $fullname = trim($_POST["fullname"]);
    }

    // Validate card
    if(empty(trim($_POST["card"]))){
        $card_err = "Παρακαλώ δώστε τον αριθμό της πιστωτικής/χρεωστικής σας κάρτας.";
    } elseif(strlen(trim($_POST["card"])) != 16){
        $card_err = "Ο αριθμός της κάρτας πρέπει να περιέχει 16 χαρακτήρες.";
    } else{
        $card = trim($_POST["card"]);
    }

    // Check input errors before inserting in database
    if(empty($card_err) && empty($fullname_err)){

        // Prepare an insert statement
        $sql = "UPDATE users SET fullname = ?, card = ? WHERE id = ? ";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_fullname, $param_card, $param_id);

            // Set parameters
            $param_fullname = $fullname;
            $param_card = $card;
            $param_id = $myid;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect
				$done_message = "<div class='alert alert-success' role='alert'>Η αλλαγή ολοκληρώθηκε!</div>";
                //header("location: edit.php");
            } else{
                echo "Κάποιο λάθος συνέβη, δοκιμάστε ξανά αργότερα!";
			}

			// Close statement
			mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
 <html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Επεξεργασία Προφίλ</title>

  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/buttons.css">

</head>

<body>

<?php include '../topMenuLoggedIn.php'; ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 text-center">
        <h1 class="mt-5">Επεξεργασία Προφίλ</h1>
		<hr>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

				<div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
					<label>Ονοματεπώνυμο</label>
					<input type="text" name="fullname" class="form-control" value="<?php echo $userDataCard ?>">
					<span class="help-block"><?php echo $fullname_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($card_err)) ? 'has-error' : ''; ?>">
					<label>Νέος Αριθμός Χρεωστικής/Πιστωτικής Κάρτας</label>
					<input type="text" name="card" class="form-control" value="<?php echo $userDataFullname ?>">
					<span class="help-block"><?php echo $card_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Υποβολή">
					<a class="btn btn-link" href="index.php">Ακύρωση</a>
				</div>
			</form>
			<?php echo $done_message ?>
		</div>
		<div class="col-lg-3"></div>
    </div>
  </div>
  <?php include '../footer.php'; ?>
</body>

</html>