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

    function createLocation() {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();
    
        // Prepare and bind the SQL statement
        $stmt = $pdo->prepare("INSERT INTO location (nbplace, prix, datedepare, villedepare, villefin, Cin, mat) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->loc_nbplace, $this->loc_prix, $this->loc_datedepare, $this->loc_villedepare, $this->loc_villefin, $this->loc_Cin, $this->loc_mat]);
    }
    
    function showAvailableLocations() {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();
    
        $stmt = $pdo->prepare("SELECT * FROM location WHERE nbplace >= 1");
        $stmt->execute();
        $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $locations;
    }

    function makeLocation($locationId)
    {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Update nbplace - 1 for the selected location
        $stmt = $pdo->prepare("UPDATE location SET nbplace = nbplace - 1 WHERE idlocation = ?");
        $stmt->execute([$locationId]);
        
           // Fetch the matricule for the selected location
        $stmt = $pdo->prepare("SELECT mat FROM location WHERE idlocation = ?");
        $stmt->execute([$locationId]);
        $location = $stmt->fetch(PDO::FETCH_ASSOC);

        // Update the user's placeRes with the mat of the car
        $stmt = $pdo->prepare("UPDATE user SET placeRes = ? WHERE username = ?");
        $stmt->execute([$location['mat'], $_SESSION['username']]);
    }

    function getplaceres($username) {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();
        $stmt = $pdo->prepare("SELECT placeRes FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $placeres = $stmt->fetch(PDO::FETCH_ASSOC);
        return $placeres;
    }


    public function getUserInfo($username) {
        // Fetch user's information
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();
    
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $user;
    }
}