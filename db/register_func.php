<?php
// VARIABILI CHE ANDRO AD INSERIRE
$username = $password = $confirm_password = "";

$table = "membri";
// ERRORI DA VISUALIZZARE NEL FORM E UTILIZZATI PER ANDARE AVANTI
$username_err =   $password_err = $confirm_password_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

/** PRIMA PARTE DEL SIGNUP. 
 * 
 * 1: GUARDO I DATI RICEVUTI IN POST
 * 2: SE LI HO RICEVUTI, FACCIO UNA SELECT PER VEDERE SE ESISTE GIA LO USERNAME
 * 3: SE NON ESISTE, SEGNO VALID_USERNAME
 */



  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM $table WHERE nickname = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["username"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken.";
        } else {
          $username = trim($_POST["username"]);
         
         
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

/** SECONDA PARTE DEL SIGNUP. 
 * 
 * 1: GUARDO I DATI RICEVUTI IN POST
 * 2: CONTROLLO CHE LA PASSWORD SIA VALIDA
 * 3: SE E GIUSTO, NON SEGNO ERRORI IN PASSWORD_ERR
 */



  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have atleast 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);

    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

/** TERZA PARTE DEL SIGNUP. 
 * 
 * 1: CONTROLLO CHE NON CI SIANO ERRORI
 * 2: PREPARO UNO STATEMENT DI INSERT
 * 3: SE L'EXECUTION FUNZIONA, SEGNO UN SUCCESS (MAGARI PER UN'ANIMAZIONE?)
 * 4: RIMANDO AD UNA PAGINA DI MIA SCELTA
 */



  // Check input errors before inserting in database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO $table (nickname, password) VALUES (?, ?)";
   
    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
     
      // Set parameters
      
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      mysqli_stmt_bind_param($stmt, "ss", $username, $param_password);
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Close statement
        mysqli_stmt_close($stmt);
        // Redirect to login page
        $_SESSION["success"] = true;
        header("location: http://localhost/EVENTI_DB/login.php");
      }
    }
  } else {
      // c'è qualche errore segnalato
  }
}



// Close connection
mysqli_close($link);
