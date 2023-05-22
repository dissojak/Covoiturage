<?php
include_once('../models/Voiture.php');
include_once('../database/connexion.php');

class VoitureController extends Connexion
{

    public function insertVoiture($voiture)
    {

        // Prepare the INSERT statement for the voiture table
        $stmtVoiture = $this->pdo->prepare("INSERT INTO voiture (mat, cin, model) VALUES (?, ?, ?)");
        $stmtVoiture->execute([$voiture->getMat(), $voiture->getCin(), $voiture->getCarModel()]);
    }

    public function getMatbyCin($cin)
    {
        $stmt = $this->pdo->prepare("SELECT mat FROM voiture WHERE cin = ?");
        $stmt->execute([$cin]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['mat'];
    }
    
    

}
