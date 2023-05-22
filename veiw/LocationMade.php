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
// $VC = new VoitureController();
$LC = new LocationController();

// $cin = $AC->getCinbyUsername($username);
// $mat = $VC->getMatbyCin($cin);
$mat = $AC->getPlaceResbyUsername($username);
// $id = $LC->getIdbyMat($mat);
// $nbPlace = $LC->getNumberOfPlace($cin);
// $_SESSION['mat'] = $mat;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservation Made</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Reservation</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Price</th>
                    <th>Departure Date</th>
                    <th>Departure City</th>
                    <th>Destination City</th>
                    <th>Cin</th>
                    <th>Mat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $showReservation = $LC->showReservation($mat);

                foreach ($showReservation as $location) {
                    echo "<tr>";
                    echo "<td>" . $location['prix'] . "</td>";
                    echo "<td>" . $location['datedepare'] . "</td>";
                    echo "<td>" . $location['villedepare'] . "</td>";
                    echo "<td>" . $location['villefin'] . "</td>";
                    echo "<td>" . $location['cin'] . "</td>";
                    echo "<td>" . $location['mat'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='deleteReservation.php'>";
                    echo "<input type='hidden' name='username' value='" . $username . "'>";
                    // not like this it need to take cin to make place res null not idlocation 
                    echo "<button type='submit' class='btn btn-primary' name='ML'>Cancel Reservation</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- Button to redirect to LocationMade.php -->
        <!-- <a href="LocationMade.php" class="btn btn-primary">Go to Location Made</a> -->
    </div>
    <!-- Add Bootstrap JS link here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>