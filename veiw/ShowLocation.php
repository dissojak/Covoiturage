<?php
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Locations</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Available Locations</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Number of Places</th>
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
                $loc = new LocationController();
                $availableLocations = $loc->showAvailableLocations();

                foreach ($availableLocations as $location) {
                    echo "<tr>";
                    echo "<td>" . $location['nbplace'] . "</td>";
                    echo "<td>" . $location['prix'] . "</td>";
                    echo "<td>" . $location['datedepare'] . "</td>";
                    echo "<td>" . $location['villedepare'] . "</td>";
                    echo "<td>" . $location['villefin'] . "</td>";
                    echo "<td>" . $location['Cin'] . "</td>";
                    echo "<td>" . $location['mat'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='payment.php'>";
                    echo "<input type='hidden' name='idlocation' value='" . $location['idlocation'] . "'>";
                    echo "<button type='submit' class='btn btn-primary' name='ML'>Make Location</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- Button to redirect to LocationMade.php -->
        <a href="LocationMade.php" class="btn btn-primary">Location Made</a>
        <!-- Button to redirect to AddVoiture.php -->
        <a href="AddVoiture.php" class="btn btn-primary">Add Voiture</a>
    </div>
    <!-- Add Bootstrap JS link here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
