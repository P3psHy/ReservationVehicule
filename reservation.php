<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Véhicule</title>
</head>
<body>

    <?php
    require_once "connection.php";


    $sqlReservation=$connection ->prepare('SELECT dateDebut, dateFin, vehicule.marque, vehicule.modele, utilisateur.nom, utilisateur.prenom 
                                            FROM reservation 
                                            INNER JOIN utilisateur ON reservation.idUser = utilisateur.idUser 
                                            INNER JOIN vehicule ON reservation.idVehicule=vehicule.idVehicule;');
    
    $sqlReservation->execute();
    $ligneReservation = $sqlReservation->fetchall();

    if(empty($ligneReservation)){
        echo "Pas de réservation actuellement<br><br>";
    }else{

        foreach($ligneReservation as $reservation){
        
            ?>
            <div>
            <p>Véhicule: <?php echo $reservation['marque'].' '.$reservation['modele'];?> réservé par <?php echo $reservation['prenom'].' '.$reservation['nom']; ?> 
            Du <?php echo $reservation['dateDebut']; ?> au <?php echo $reservation['dateFin']; ?></p>
            </div>
            <?php
        }

    }
    
    

    ?>



    <a href="ajouterReservation.php"><button>Ajouter Reservation</button></a>
</body>
</html>