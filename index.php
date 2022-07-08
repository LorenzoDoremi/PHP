<?php
// Initialize the session

// Check if the user is already logged in, if yes then redirect him to welcome page
/* if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: welcome.php");
    exit;
} */
// Include config file
require_once "db/config.php";



?>



<?php require "modules/head.html"; ?>

<body id="content">
    <?php require "modules/navigation.php"; ?>

    <main id="home-container">


        <?php
     


            include "db/load_all_events.php";
    


        ?>

</body>

</html>