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

    $LC = new LocationController();
    // echo $mat;
    // echo '<br/>';
    // echo $cin;
    
    if($LC->checkLocationByCin($cin)==TRUE)
    {
        $LC->deleteExpiredLocations();
        $loc = new location($nbplace, $prix, $datedepare, $villedepare, $villefin, $cin, $mat);

        $LC->createLocation($loc);
        //just for now 
        // gona chaaaaange
        header('Location: PlacesStillAvailabale.php');
        exit();
    }
    if($LC->checkLocation($cin)){
        header('Location: CarExisteInLocation.php');
    }
    else {
        $loc = new location($nbplace, $prix, $datedepare, $villedepare, $villefin, $cin, $mat);
        
        $LC->createLocation($loc);
        //just for now 
        // gona chaaaaange
        header('Location: PlacesStillAvailabale.php');
        //echo $LC->checkLocation($cin);
        //exit();
    }
    
?>
