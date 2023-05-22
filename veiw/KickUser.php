<?php
require_once('../controllers/AccountController.php');
$AC = new AccountController();
$cin=$_POST['cin'];
$AC->kick($cin);
header('Location:UsersInCar.php');
?>
