<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/VoitureController.php');
require_once('../models/Voiture.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');

session_start();
$username = $_SESSION['username'];

// Retrieve the username from the session
$AC = new AccountController();
$VC = new VoitureController();
$LC = new LocationController();

$cin = $AC->getCinbyUsername($username);
$mat = $VC->getMatbyCin($cin);
$id = $LC->getIdbyMat($mat);
$nbPlace = $LC->getNumberOfPlace($cin);
$_SESSION['mat'] = $mat;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Places</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="w-1/2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold mb-6 text-center">Available Places</h1>
    
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">ID Car Location</h2>
                    <p class="text-gray-500"><?php echo $id; ?></p>
                </div>
    
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Places that are still available</h3>
                    <p class="text-4xl font-bold text-green-600"><?php echo $nbPlace; ?></p>
                </div>
            </div>
    
            <div class="flex justify-center mt-6">
                <a href="UsersInCar.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Users In Your Car
                </a>
            </div>
        </div>
    </div>
</body>
</html>


