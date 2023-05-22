<?php
require_once('../controllers/AccountController.php');
$AC = new AccountController();
$username=$_POST['username'];
$AC->deleteReservation($username);
header('Location:LocationMade.php');
?>