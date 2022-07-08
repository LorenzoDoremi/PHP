<?php require "modules/head.html"; ?>

<body id="content">
    <?php require "modules/navigation.php"; ?>
    <?php
    // Initialize the session

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    } else {
        header("location: index.php");
        exit;
    }
    // Include config file
    require_once "db/config.php";



    ?>

    <main id="home-container">
        <div id="wrapper">

            <h1> Ecco i miei eventi </h1>

            <?php include "db/load_events.php" ?>



        </div>
</body>

</html>