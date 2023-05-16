<?php
require_once('Accounts.php');
$acc = new accounts();
session_start();

$acc->acc_nom = $_SESSION["nom"];
$acc->acc_prenom = $_SESSION["prenom"];
$acc->acc_cin = $_SESSION["cin"];
$acc->acc_adresse = $_SESSION["adresse"];
$acc->acc_role = $_SESSION["role"];
$acc->acc_tel= $_SESSION['tel'];
$acc->acc_username = $_SESSION['username'];
$acc->acc_pw = $_SESSION['password'];
$acc->acc_carModel = $_POST["model"];
$acc->acc_mat = $_POST['mat'];

$acc->insertUser();
$acc->insertVoiture();
header('Location: AddLocation.php');
exit();
?>
