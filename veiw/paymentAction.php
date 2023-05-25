<?php

require_once('../controllers/CardController.php');
require_once('../models/Card.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php'); 

session_start();
$locationId=$_SESSION['idlocation'];
$cardNumber = $_POST['card'];
$dateCard = $_POST['dateCard'];
$cvv = $_POST['cvv'];
$nameOwner = $_POST['nameOwner'];

$CC = new CardController();
$LC = new LocationController();
$card = new Card($cardNumber, $dateCard, $cvv, $nameOwner);
if ($CC->verifyCard($cardNumber)) {
    $prix = $LC->getLocationPrice($locationId);
    if ($CC->verifyAmount($prix,$cardNumber)) {

        $CC->deductAmount($prix,$cardNumber);
        header('Location: MakeLocation.php');
        exit();

    } else {
        // Insufficient amount of money
        ?>
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Insufficient Funds</title>
          <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        </head>
        
        <body>
          <div class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="bg-white p-8 shadow-lg rounded-lg">
              <h2 class="text-2xl font-bold mb-4">Insufficient Funds</h2>
              <p class="mb-4">The amount of money in your card is insufficient to make the payment.</p>
              <a href="ShowLocation.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Go Back</a>
            </div>
          </div>
        </body>
        
        </html>
        <?php
    }
} else {
    // Invalid card
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Invalid Card</title>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    
    <body>
      <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 shadow-lg rounded-lg">
          <h2 class="text-2xl font-bold mb-4">Invalid Card</h2>
          <p class="mb-4">The card you entered is not valid.</p>
          <a href="ShowLocation.php" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Go Back</a>
        </div>
      </div>
    </body>
    
    </html>
    <?php
}


?>