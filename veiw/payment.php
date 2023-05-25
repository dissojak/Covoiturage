<?php

session_start();
$locationId = $_POST['idlocation'];
$_SESSION['idlocation'] = $locationId;
// echo $locationId;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Payment</title>
</head>

<body>
  <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 shadow-lg rounded-lg">
      <h2 class="text-2xl font-bold mb-4">Payment</h2>
      <form class="space-y-4" method="POST" action="paymentAction.php">
        <div>
          <label class="block mb-2" for="card-number">Card Number</label>
          <input type="text" id="card" name="card" class="border border-gray-300 px-4 py-2 rounded-lg w-full" placeholder="Enter card number" required>
        </div>
        <div class="flex justify-between">
          <div class="w-1/2 mr-2">
            <label class="block mb-2" for="expiry-date">Expiry Date</label>
            <input type="text" id="dateCard" name="dateCard" class="border border-gray-300 px-4 py-2 rounded-lg w-full" placeholder="MM/YY" required>
          </div>
          <div class="w-1/2 ml-2">
            <label class="block mb-2" for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" class="border border-gray-300 px-4 py-2 rounded-lg w-full" placeholder="CVV" required>
          </div>
        </div>
        <div>
          <label class="block mb-2" for="card-holder-name">Cardholder Name</label>
          <input type="text" id="nameOwner" name="nameOwner" class="border border-gray-300 px-4 py-2 rounded-lg w-full" placeholder="Enter cardholder name" required>
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Pay Now</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
