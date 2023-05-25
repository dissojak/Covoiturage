<?php
    require_once('../controllers/LocationController.php');
    require_once('../models/Location.php');
    session_start();
    $username = $_SESSION["username"];
    $cin = $AC->getCinbyUsername($username);

    if($LC->checkLocationByCin($cin)==TRUE)

    // just fuck this shit