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

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Πληκτρολογήστε τον νέο κωδικό πρόσβασης.";
    } elseif(strlen(trim($_POST["new_password"])) < 8){
        $new_password_err = "Ο κωδικός πρέπει να έχει τουλάχιστον 8 χαρακτήρες.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Παρακαλώ επιβεβαιώστε τον κωδικό σας.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Οι κωδικοί δεν ταιριάζουν μεταξύ τους.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: ../login.php");
                exit();
            } else{
                echo "Κάποιο λάθος συνέβη, δοκιμάστε ξανά αργότερα!";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
 <html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Φόρτιση Εισιτηρίου</title>

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
        <h1 class="mt-5">Αλλαγή Κωδικού</h1>
		<hr>
		<p>Συμπληρώστε την παρακάτω φόρμα για να αλλάξετε τον κωδικό πρόσβαση σας.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
					<label>Νέος Κωδικός</label>
					<input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
					<span class="help-block"><?php echo $new_password_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<label>Επιβεβαίωση Κωδικού</label>
					<input type="password" name="confirm_password" class="form-control">
					<span class="help-block"><?php echo $confirm_password_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Υποβολή">
					<a class="btn btn-link" href="index.php">Ακύρωση</a>
				</div>
			</form>
		</div>
		<div class="col-lg-3"></div>
    </div>
  </div>
  <?php include '../footer.php'; ?>
</body>

</html>