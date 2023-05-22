<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../models/Voiture.php');
session_start();

$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$cin = $_SESSION["cin"];
$adresse = $_SESSION["adresse"];
$role = $_SESSION["role"];
$tel= $_SESSION['tel'];
$username = $_SESSION['username'];
$pw = $_SESSION['password'];
$carModel = $_POST["model"];
$mat = $_POST['mat'];

$account= new Account($username, $pw, $nom, $cin, $adresse, $tel, $role);
$voiture= new Voiture($mat,$cin,$carModel);
$AC = new AccountController();
$VC = new VoitureController();


$AC->insertUser($account);
$VC->insertVoiture($voiture);
$_SESSION['mat'] = $mat;
header('Location: AddLocation.php');
exit();
?>
