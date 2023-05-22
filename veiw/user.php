<?php
class user
{
    function __construct(){}

    function displayOwnerData() {
        require_once('connexion.php');
        $cnx = new connexion();
        $pdo = $cnx->Cnx();

        // Fetch data from the owner table sorted by idOwner in descending order
        $stmt = $pdo->prepare("SELECT o.cin, o.place_dispo, o.model, u.nom FROM owner o JOIN user u ON o.cin = u.cin ORDER BY o.idOwner DESC");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        // Display the data as posts
        foreach ($rows as $row) {
            echo "<div class='post'>";
            echo "<div class='post-title'> {$row['nom']}</div>";
            echo "<div class='post-details'>";
            echo "CIN: {$row['cin']}<br>";
            echo "Places disponibles: {$row['place_dispo']}<br>";
            echo "Modèle: {$row['model']}";
            echo "</div>";
            echo "</div>";
        }
    }
}
?>
