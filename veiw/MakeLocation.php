<?php
require_once('../controllers/LocationController.php');
require_once('../models/Location.php'); 
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');

session_start();
$username = $_SESSION['username'];
$LC = new LocationController();
$AC = new AccountController();

$locationId = $_SESSION['idlocation'];

if ($AC->checkPlaceReservation($username)) {
    $LC->makeLocation($locationId);
    // Redirect to the page after making the location
    header('Location: LocationMade.php');
    exit();
} else {
    // Already made a reservation
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservation Already Made</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Reservation Already Made</h2>
                <p class="mb-4">You have already made a reservation.</p>
                <a href="LocationMade.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Go to Your Reservation</a>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>
