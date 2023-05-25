<?php
include_once('../models/Location.php');
include_once('../database/connexion.php');

class LocationController extends Connexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createLocation($location)
    {
        // Prepare and bind the SQL statement
        $stmt = $this->pdo->prepare("INSERT INTO location (nbplace, prix, datedepare, villedepare, villefin, Cin, mat) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$location->getNbPlace(), $location->getPrix(), $location->getDateDepare(), $location->getVilleDepare(), $location->getVilleFin(), $location->getCin(), $location->getMat()]);
    }

    public function showAvailableLocations()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM location WHERE nbplace >= 1");
        $stmt->execute();
        $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $locations;
    }

    public function makeLocation($locationId)
    {
        // Update nbplace - 1 for the selected location
        $stmt = $this->pdo->prepare("UPDATE location SET nbplace = nbplace - 1 WHERE idlocation = ?");
        $stmt->execute([$locationId]);

        // Fetch the matricule for the selected location
        $stmt = $this->pdo->prepare("SELECT mat FROM location WHERE idlocation = ?");
        $stmt->execute([$locationId]);
        $location = $stmt->fetch(PDO::FETCH_ASSOC);

        // Update the user's placeRes with the mat of the car
        $stmt = $this->pdo->prepare("UPDATE user SET placeRes = ? WHERE username = ?");
        $stmt->execute([$location['mat'], $_SESSION['username']]);
    }

    public function getPlaceRes($username)
    {
        $stmt = $this->pdo->prepare("SELECT placeRes FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $placeRes = $stmt->fetch(PDO::FETCH_ASSOC);

        return $placeRes;
    }

    public function getUserInfo($username)
    {
        // Fetch user's information
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
    function getNumberOfPlace($cin)
    {
        $stmt =$this->pdo->prepare("SELECT nbplace FROM location WHERE cin = ?");
        $stmt->execute([$cin]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $numberOfPlace = $result['nbplace'];
        
        return $numberOfPlace;
    }
    public function getIdbyMat($mat)
    {
        $stmt = $this->pdo->prepare("SELECT idlocation FROM location WHERE mat = ?");
        $stmt->execute([$mat]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['idlocation'];
    }

    // UsersInCar

    public function UsersInCar($mat)
    {
        $stmt = $this->pdo->prepare("SELECT nom, pr, cin, tel FROM user WHERE placeRes = ?");
        $stmt->execute([$mat]);
        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $userInfo;
    }
    public function showReservation($mat)
    {
        $stmt = $this->pdo->prepare("SELECT prix, datedepare, villedepare, villefin, cin, mat  FROM location WHERE mat = ?");
        $stmt->execute([$mat]);
        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $userInfo;
    }

    public function checkLocationByCin($cin)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM location WHERE Cin = ?");
        $stmt->execute([$cin]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];
        if ($count > 0) {
            return true; // Location exists for the given cin
        } else {
            return false; // No location found for the given cin
        }
    }

    public function deleteExpiredLocations()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $threeHoursFromNow = date('Y-m-d H:i:s', strtotime('+3 hours'));
        $sql = "DELETE FROM location WHERE (datedepare + INTERVAL 3 HOUR) < '$currentDateTime'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    function checkLocation($cin)
    {
        $now = new DateTime(); // Current date and time

        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM location WHERE Cin = ? AND DATE_ADD(datedepare, INTERVAL 2 HOUR) > ?");
        $stmt->execute([$cin, $now->format('Y-m-d H:i:s')]);
        $count = $stmt->fetchColumn();
    
        return $count > 0;
    }

    public function getLocationPrice($idlocation)
    {
        $stmt = $this->pdo->prepare("SELECT prix FROM location WHERE idlocation = ?");
        $stmt->execute([$idlocation]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['prix'];
    }



}
