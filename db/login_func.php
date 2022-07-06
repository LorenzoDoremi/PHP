<?php
// Initialize the session
session_start();


// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username =  trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
		$passT = $_POST["password"];
        $password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

    // la versione inserita contiene caratteri strani    
		if(strlen($passT) > strlen($password)) {
			 echo "hai tentato di forare il server eh? furbo";
		}
	}
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
      
			  $sql = "SELECT id, nickname, password FROM membri WHERE nickname = ?";
			   
			 
		
		
        
        if($stmt = mysqli_prepare($link, $sql)){
               // Set parameters
            $param_username = $username;
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
          
         
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
										        header("location: http://localhost/EVENTI_DB/index.php");
                           
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                   
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        else {
          echo  "error";
        }
    }
  }
    // Close connection
    mysqli_close($link);

?>