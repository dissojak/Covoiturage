<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/VoitureController.php');
require_once('../models/Voiture.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');

session_start();
$username = $_SESSION['username'];
$mat = $_SESSION["mat"];
// Retrieve the username from the session
$AC = new AccountController();
$VC = new VoitureController();
$LC = new LocationController();

// $cin = $AC->getCinbyUsername($username);
// $mat = $VC->getMatbyCin($cin);
// $id = $LC->getIdbyMat($mat);
// $nbPlace = $LC->getNumberOfPlace($cin);
$userInfo = $LC->UsersInCar($mat);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6" style="margin-left: 25px;">Users Going Information</h1>

        <?php if (!empty($userInfo)): ?>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-semibold">Users in Car</h2>

                <div class="mt-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Surname</th>
                                <th class="px-4 py-2">CIN</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($userInfo as $user): ?>
                                <tr>
                                    <td class="border px-4 py-2"><?php echo $user['nom']; ?></td>
                                    <td class="border px-4 py-2"><?php echo $user['pr']; ?></td>
                                    <td class="border px-4 py-2"><?php echo $user['cin']; ?></td>
                                    <td class="border px-4 py-2"><?php echo $user['tel']; ?></td>
                                    <td class="border px-4 py-2">
                                        <form action="KickUser.php" method="post">
                                            <input type="hidden" name="cin" value="<?php echo $user['cin']; ?>">
                                            <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Kick User">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-semibold">No Users in Car</h2>
                <p>No users are currently in the car.</p>
            </div>
        <?php endif; ?>

        <!-- Button to redirect to PlacesStillAvailable.php -->
        <br/>
        <a href="PlacesStillAvailabale.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 float-right" style="margin-right: 25px;">Places Still Available</a>
    </div>
</body>
</html>
