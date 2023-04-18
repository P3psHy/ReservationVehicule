<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
}else{
    if(!$_SESSION['aPermis']){
        echo'<script>alert("Vous n\'avez pas le permis, vous ne pouvez pas faire de réservation de véhicule")</script>';
        echo'<a href="index.php"><button>Retour au menu de connexion</button></a>';

    }else{

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Réservation</title>
</head>
<body onload="verifButton()">
    <h2>Créér votre réservation</h2>
    <form action="addReservation.php" method="get">

    <div>
        <label for="dateDebut">Date de début</label> <!-- Si avoir du temps, ajouter du js pour vérifier que la date n'est pas déjà dépassé -->
        <input id="dateDebut" name="dateDebut" type="date" onchange="verifDateDebut()">
    </div>
        <label for="dateFin">Date de fin</label> <!-- Si avoir du temps, ajouter du js pour vérifier que la date ne dépasse pas le temps autorisé par l'entreprise -->
        <input id="dateFin" name="dateFin" type="date" onchange="verifDateFin()">
    <div>

    </div>
        <label for="listeVehicule">Véhicules disponibles</label>
        <select name="idVehicule" id="listeVehicule" onchange="verifVehicule()">
            <option value="default" selected>Sélectionez un véhicule</option>
            <?php
            require_once "connection.php";

            $sqlVehicule=$connection ->prepare('SELECT * FROM vehicule WHERE vehicule.idVehicule NOT IN (SELECT vehicule.idVehicule
                                                                                                        FROM reservation
                                                                                                        INNER JOIN vehicule ON reservation.idVehicule = vehicule.idVehicule
                                                                                                        WHERE dateFin < NOW());');
            
            $sqlVehicule->execute();
            $ligneVehicule = $sqlVehicule->fetchall();
            
            
            foreach($ligneVehicule as $vehicule){
                echo'<option value="'.$vehicule['idVehicule'].'">'.$vehicule['marque'].' '.$vehicule['modele'].'</option>';
            }

            ?>
        </select>
    <div>
        
    </div>
        <button id="submitReservation" type="submit">Valider</button>
        <button type="reset">Annuler</button>
        <a href="reservation.php"><button>Retour</button>
</a>
    </form>

    <script src="jsReservation.js"></script>

</body>
</html>

<?php
        
    }
}
        
?>
