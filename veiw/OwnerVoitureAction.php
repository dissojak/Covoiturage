<?php
require_once('../controllers/AccountController.php');
require_once('../controllers/VoitureController.php');
require_once('../models/Account.php');
require_once('../models/Voiture.php');
session_start();

$VC = new VoitureController();
$AC = new AccountController();
$username = $_SESSION['username'];
// *********************
echo $username;
// *********************
$carModel = $_POST["model"];
$mat = $_POST['mat'];

if ($AC->selectRole($username) == "user") {
    $cin = $AC->getCinbyUsername($username);
    $voiture = new Voiture($mat, $cin, $carModel);
    $AC->updateRoleToOwner($username);
    $VC->insertVoiture($voiture);
    $_SESSION['mat'] = $mat;
    header('Location: AddLocation.php');
} else {
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $cin = $_SESSION["cin"];
    $adresse = $_SESSION["adresse"];
    $role = $_SESSION["role"];
    $tel = $_SESSION['tel'];
    $pw = $_SESSION['password'];

    $account = new Account($username, $pw, $nom,$prenom, $cin, $adresse, $tel, $role);
    $voiture = new Voiture($mat, $cin, $carModel);

    $AC->insertUser($account);
    $VC->insertVoiture($voiture);
    $_SESSION['mat'] = $mat;
    header('Location: AddLocation.php');
    exit();
}
?>
