<?php
require_once('../controllers/LocationController.php');
require_once('../models/Location.php'); 

session_start();
$LC = new LocationController();

$locationId = $_POST['location_id'];
$LC->makeLocation($locationId);
// Redirect to the page after making the location
header('Location: ShowLocation.php');
header('Location: LocationMade.php');
exit();

?>