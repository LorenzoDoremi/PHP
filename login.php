<?php require_once "db/login_func.php"; ?>
<?php include "modules/head.html";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: profile.php");
  exit;
}
?>
<main id="home-container">
    <div class="wrapper">
	<div id="form-container">
        <h2>Partecipa subito a Moot</h2>
        <p>Inserisci i tuoi dati di accesso </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" id="login" class="btn btn-primary" value="Entra in moot">
            </div>
            <p>Non sei iscritto?<a href="register.php" >Crea subito un account</a>.</p>
        </form>
		</div>
    </div>  
	<div class="wrapper" id="logo-container"> </div>
</main>	

