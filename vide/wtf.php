<?php
class location
{
    function __construct(){}
    public $loc_nbplace;
    public $loc_prix;
    public $loc_datedepare;
    public $loc_villedepare;
    public $loc_villefin;
    public $loc_Cin;
    public $loc_mat;
    public $loc_idGoing;

    function createLocation() {

        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        $stmtINSERTid = $pdo->prepare("INSERT INTO going VALUES(NULL)");
        $stmtINSERTid->execute();

        $stmtMax = $pdo->prepare("SELECT MAX(idGoing) AS maxIdGoing FROM going");
        $stmtMax->execute();
        $result = $stmtMax->fetch(PDO::FETCH_ASSOC);
        $maxIdGoing = $result['maxIdGoing']; 

        // Prepare and bind the SQL statement
        $stmt = $pdo->prepare("INSERT INTO location (nbplace, prix, datedepare, villedepare, villefin, Cin, mat, idGoing) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->loc_nbplace, $this->loc_prix, $this->loc_datedepare, $this->loc_villedepare, $this->loc_villefin, $this->loc_Cin, $this->loc_mat, $maxIdGoing]);
        
    }

}