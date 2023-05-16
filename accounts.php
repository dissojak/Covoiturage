<?php
class Accounts
{
    /* Attributes of the user class */
    public $acc_username;
    public $acc_pw;
    public $acc_nom;
    public $acc_prenom;
    public $acc_cin;
    public $acc_adresse;
    public $acc_tel;
    public $acc_role;
    public $acc_carModel;
    public $acc_mat; 

    /* Constructor */
    function __construct(){}

    function verifyLogin($acc_username, $acc_pw) {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Prepare the query to retrieve acc_username and acc_pw from the database
        $stmt = $pdo->prepare('SELECT * FROM login WHERE username = ?');
        $stmt->execute([$acc_username]);
        $user = $stmt->fetch();

        if ($user && $acc_pw === $user['pw']) {
            return true;
        } else {
            return false;
        }
    }

    function userExist($acc_username) {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Prepare the query to check if acc_username already exists
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM login WHERE username = ?');
        $stmt->execute([$acc_username]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    function cinExist($acc_cin) {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Prepare the query to check if acc_cin already exists
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM user WHERE cin = ?');
        $stmt->execute([$acc_cin]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insertUser()
    {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Prepare the INSERT statement for the login table
        $stmtLogin = $pdo->prepare("INSERT INTO login (username, pw) VALUES (?, ?)");
        $stmtLogin->execute([$this->acc_username, $this->acc_pw]);

        // Prepare the INSERT statement for the user table
        $stmtUser = $pdo->prepare("INSERT INTO user (nom, pr, cin, adresse, tel, role, username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmtUser->execute([$this->acc_nom, $this->acc_prenom, $this->acc_cin, $this->acc_adresse, $this->acc_tel, $this->acc_role, $this->acc_username]);
    }

    function insertVoiture()
    {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Prepare the INSERT statement for the voiture table
        $stmtVoiture = $pdo->prepare("INSERT INTO voiture (mat, cin, model) VALUES (?, ?, ?)");
        $stmtVoiture->execute([$this->acc_mat, $this->acc_cin, $this->acc_carModel]);
    }

    function selectRole($acc_username)
    {
        require_once('connexion.php');
        $cnx = new Connexion();
        $pdo = $cnx->Cnx();

        // Retrieve the user's role based on the provided username
        $stmt = $pdo->prepare("SELECT role FROM user WHERE username = ?");
        $stmt->execute([$acc_username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['role'];
    }



}
?>
