<?php
// Include config file
require_once "includes/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $fullname = $card ="";
$username_err = $password_err = $confirm_password_err = $fullname_err = $card_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Username.";
    } else{

        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* Save */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Αυτο το username υπάρχει ήδη.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Κάποιο λάθος συνέβη, δοκιμάστε ξανά αργότερα!";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
  
    // Validate fullname
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Παρακαλώ δώστε ονοματεπώνυμο.";     
    } elseif(strlen(trim($_POST["fullname"])) < 2){
        $password_err = "Το ονοματεπώνυμο πρέπει να έχει τουλάχιστον 2 χαρακτήρες.";
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
  
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Παρακαλώ δώστε κωδικό.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Ο κωδικός πρέπει να έχει τουλάχιστον 8 χαρακτήρες.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Παρακαλώ επιβεβαιώστε τον κωδικό σας.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Οι κωδικοί δεν ταιριάζουν μεταξύ τους.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($card_err) && empty($password_err) && empty($fullname_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, fullname, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_fullname, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_fullname = $fullname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Εγγραφή</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/basic.css">

</head>
<body>
    <div class="row">
		<div class="col-sm-4"></div> 
		<div class="col-sm-4 wrapper">
			<center><h1>OASA</h1></center>
			<hr>
			<h2>Εγγραφή</h2>
			<p>Παρακαλώ γράψτε τα στοιχεία σας για να εγγραφείτε.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
					<span class="help-block"><?php echo $username_err; ?></span>
				</div>   
				<div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
					<label>Ονοματεπώνυμο</label>
					<input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
					<span class="help-block"><?php echo $fullname_err; ?></span>
				</div>   
				<div class="form-group <?php echo (!empty($card_err)) ? 'has-error' : ''; ?>">
					<label>Αριθμός Πιστωτικής/Χρεωστικής Κάρτας</label>
					<input type="text" name="card" class="form-control" value="<?php echo $card; ?>">
					<span class="help-block"><?php echo $card_err; ?></span>
				</div> 
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label>Κωδικός</label>
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
					<span class="help-block"><?php echo $password_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<label>Επιβεβαίωση κωδικού</label>
					<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
					<span class="help-block"><?php echo $confirm_password_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Εγγραφή">
					<input type="reset" class="btn btn-default" value="Εκκαθάριση">
				</div>
				<p>Έχετε ήδη λογαριασμό; <a href="login.php">Συνδεθείτε από εδώ</a>.</p>
			</form>
		</div>
		<div class="col-sm-4"></div> 
</body>
</html>