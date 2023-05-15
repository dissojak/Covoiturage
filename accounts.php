<?php
class accounts
{
    /* attributs de la classe utilisateur */
    public $acc_username;
    public $acc_pw;
    public $acc_nom;
    public $acc_prenom;
    public $acc_cin;
    public $acc_adresse;
    public $acc_role;
    public $acc_NAS;
    public $acc_carModel;

    /* Constructeur de la classe */
    function __construct(){}

    function verifyLogin($acc_username, $acc_pw) {
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->Cnx();

        // Prepare the query to retrieve the acc_username and acc_pw from the database
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
        $cnx = new connexion();
        $pdo = $cnx->Cnx();

        // Prepare the query to check if the acc_username already exists
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
        $cnx = new connexion();
        $pdo = $cnx->Cnx();

        // Prepare the query to check if the acc_cin already exists
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM user WHERE cin = ?');
        $stmt->execute([$acc_cin]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }


    // function insertuser(){
//     require_once('connexion.php');
//     $cnx=new connexion();
//     $pdo=$cnx->Cnx();

//     $req="INSERT INTO USER (`nom`, `pr`, cin , `adresse`, `role`) 
//         values ('$this->acc_nom','$this->acc_prenom','$this->acc_cin','$this->acc_adresse','$this->acc_role')";
//     $req2="INSERT INTO login 
//     values ('$this->acc_username','$this->acc_pw')";
//     $pdo->exec($req);
//     $pdo->exec($req2);
// } 


    function insertUser()
    {
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->Cnx();

 
            // Prepare the INSERT statement for the login table
            $stmtLogin = $pdo->prepare("INSERT INTO login (username, pw) VALUES (?, ?)");
            $stmtLogin->execute([$this->acc_username, $this->acc_pw]);

            // Prepare the INSERT statement for the USER table
            $stmtUser = $pdo->prepare("INSERT INTO user (nom, pr, cin, adresse, role, username) VALUES (?, ?, ?, ?, ?, ?)");
            $stmtUser->execute([$this->acc_nom, $this->acc_prenom, $this->acc_cin, $this->acc_adresse, $this->acc_role, $this->acc_username]);
    }


    function insertOwner()
    {
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->Cnx();

        // Prepare the INSERT statement for the owner table
        $stmtOwner = $pdo->prepare("INSERT INTO owner (cin, place_dispo, model) VALUES (?, ?, ?)");
        $stmtOwner->execute([$this->acc_cin, $this->acc_NSA, $this->acc_carModel]);
    }

}
?>






