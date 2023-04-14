<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Réservation</title>
</head>
<body>
    <h2>Créér votre réservation</h2>
    <form action="addReservation.php" method="get">

    <div>
        <label for="">Date de début</label> <!-- Si avoir du temps, ajouter du js pour vérifier que la date n'est pas déjà dépassé -->
        <input name="dateDebut" type="date">
    </div>
        <label for="">Date de fin</label> <!-- Si avoir du temps, ajouter du js pour vérifier que la date ne dépasse pas le temps autorisé par l'entreprise -->
        <input name="dateFin" type="date">
    <div>

    </div>
        <label for="">Véhicules</label>
        <select name="idVehicule" id="">
            <option value="default" selected>Sélectionez un véhicule</option>
            <?php
            require_once "connection.php";

            $sqlVehicule=$connection ->prepare('SELECT * FROM vehicule');
            
            $sqlVehicule->execute();
            $ligneVehicule = $sqlVehicule->fetchall();
            
            
            foreach($ligneVehicule as $vehicule){
                echo'<option value="'.$vehicule['idVehicule'].'">'.$vehicule['marque'].' '.$vehicule['modele'].'</option>';
            }

            ?>
        </select>
    <div>
        
    </div>
        <button type="submit">Valider</button>
    </form>
</body>
</html>