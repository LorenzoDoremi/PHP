<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
/* if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: welcome.php");
    exit;
} */
// Include config file
require_once "db/config.php";
require_once "db/register_func.php";

?>



<?php require "modules/head.html"; ?>

<body id="content">
    <script>


    </script>
    <main id="home-container">

        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

            include "modules/welcome.php";
        } else include "modules/log.php"

        ?>

</body>

</html>