<?php
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $LC = new LocationController();
    $placeres = $LC->getplaceres($username);

    // Display the reserved matricule
    if ($placeres !== null && isset($placeres['placeRes'])) {
        $reservedMatricule = $placeres['placeRes'];
        $deleteURL = "delete_reservation.php";

        // Display the reserved matricule with option to delete
        echo '<div class="container">';
        echo '<h1>Reserved Matricule</h1>';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Reserved Matricule: ' . $reservedMatricule . '</h5>';
        echo '<form action="' . $deleteURL . '" method="post">';
        echo '<input type="hidden" name="matricule" value="' . $reservedMatricule . '">';
        echo '<button class="btn btn-danger" type="submit">Delete Reservation</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<h1>No Reservation</h1>';
        echo '<p>No place is currently reserved.</p>';
        echo '</div>';
    }
} else {
    // If the user is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
