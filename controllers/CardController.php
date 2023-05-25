<?php
include_once('../models/Card.php');
include_once('../database/connexion.php');

class CardController extends Connexion
{
    public function verifyCard($cardNumber)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM payment WHERE card = ?");
        $stmt->execute([$cardNumber]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $isValid = ($result !== false);
        return $isValid; 
    }
    
    public function verifyAmount($prix,$cardNumber)
    {
        $stmt = $this->pdo->prepare("SELECT money FROM payment WHERE card = ?");
        $stmt->execute([$cardNumber]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $money = $row['money'];

        if ($prix <= $money) {
            return true;
        }
        return false;
    }

    public function deductAmount($prix,$cardNumber)
    {
        $stmt = $this->pdo->prepare("UPDATE payment SET money = money - ? WHERE card = ?");
        $stmt->execute([$prix,$cardNumber]);
        
        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
}
?>
