<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
$personal_nav = false;

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $personal_nav = true;
}
// Include config file

?>

<nav id="nav">


    <div id="pic"> <a href="index.php">Eventus</a> </div>





    <?php if ($personal_nav) {
        include "./modules/nav_modules/nav_log.php";
    } else include "./modules/nav_modules/nav_common.php";
    ?>

</nav>