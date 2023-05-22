<?php
    require_once('../controllers/LocationController.php');
    require_once('../models/Location.php');
    session_start();

    // Get the values from the form
    $nbplace = $_POST["nbplace"];
    $prix = $_POST["prix"];
    $datedepare = $_POST["datedepare"];
    $villedepare = $_POST["villedepare"];
    $villefin = $_POST["villefin"];
    $cin = $_SESSION["cin"];
    $mat = $_SESSION["mat"];

    // echo $mat;
    // echo '<br/>';
    // echo $cin;
    
    $loc = new location($nbplace, $prix, $datedepare, $villedepare, $villefin, $cin, $mat);
    $LC = new LocationController();


    $LC->createLocation($loc);
    //just for now 
    header('Location: PlacesStillAvailabale.php');
    exit();
?>
