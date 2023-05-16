<?php
    require_once('location.php');
    $loc = new location();
    session_start();

    // Get the values from the form
    $loc->loc_nbplace = $_POST["nbplace"];
    $loc->loc_prix = $_POST["prix"];
    $loc->loc_datedepare = $_POST["datedepare"];
    $loc->loc_villedepare = $_POST["villedepare"];
    $loc->loc_villefin = $_POST["villefin"];
    $loc->loc_Cin = $_POST["Cin"];
    $loc->loc_mat = $_POST["mat"];


    $loc->createLocation();
    //just for now 
    header('Location: login.php');
    exit();
?>
