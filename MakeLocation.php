<?php
require_once('location.php');
$loc = new location();
session_start();

if (isset($_POST['ML'])) {
    $locationId = $_POST['location_id'];
    $loc->makeLocation($locationId);
    // Redirect to the page after making the location
    header('Location: ShowLocationMade.php');
    exit();
}
?>