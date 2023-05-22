<?php
include_once('../models/Account.php');
include_once('../database/connexion.php');

class AccountController extends Connexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verifyLogin($username, $pw)
    {

        // Prepare the query to retrieve username and pw from the database
        $stmt = $this->pdo->prepare('SELECT * FROM login WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && $pw === $user['pw']) {
            return true;
        } else {
            return false;
        }
    }

    public function userExist($username)
    {

        // Prepare the query to check if username already exists
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM login WHERE username = ?');
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cinExist($cin)
    {

        // Prepare the query to check if cin already exists
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM user WHERE cin = ?');
        $stmt->execute([$cin]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCinbyUsername($username)
    {
    $stmt = $this->pdo->prepare("SELECT cin FROM user WHERE username = ?");
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['cin'];
    }


    public function insertUser($account)
    {

        // Prepare the INSERT statement for the login table
        $stmtLogin = $this->pdo->prepare("INSERT INTO login (username, pw) VALUES (?, ?)");
        $stmtLogin->execute([$account->getUsername(), $account->getPw()]);

        // Prepare the INSERT statement for the user table
        $stmtUser = $this->pdo->prepare("INSERT INTO user (nom, pr, cin, adresse, tel, role, username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmtUser->execute([$account->getNom(), $account->getPrenom(), $account->getCin(), $account->getAdresse(), $account->getTel(), $account->getRole(), $account->getUsername()]);
    }

    public function selectRole($username)
    {

        // Retrieve the user's role based on the provided username
        $stmt = $this->pdo->prepare("SELECT role FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['role'];
    }

    public function kick($cin)
    {
        $stmt = $this->pdo->prepare("UPDATE user SET placeRes = NULL WHERE cin = ?");
        $stmt->execute([$cin]);
        return $stmt->rowCount() > 0; // Returns true if the user was kicked successfully
    }
    public function getPlaceResbyUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT placeRes FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $placeRes = $stmt->fetchColumn();
        return $placeRes;
    }
    public function deleteReservation($username)
    {
        $stmt = $this->pdo->prepare("UPDATE user SET placeRes = NULL WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->rowCount() > 0; 
    }

}

?>
