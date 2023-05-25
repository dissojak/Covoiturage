<?php
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
    
session_start();

$username = $_SESSION['username'];
$mat = $_SESSION["mat"];
$LC = new LocationController(); 
$AC = new AccountController(); 


    $userInfo = $LC->UsersInCar($mat);
    $nb= $LC->getNumberOfPlace($cin);
    $cin = $AC->getCinbyUsername($username);

    if (empty($userInfo) && $nb==0 ){
        header('Location: CarNotInLocation.php');
    }
    else 
    {
        header('Location: PlacesStillAvailabale.php');
        exit();
    }
?>