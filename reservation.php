<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Véhicule</title>
</head>
<body>
    <h2>Véhicule réservé</h2>
    <?php
    session_start();

    require_once "connection.php";


    $sqlReservation=$connection ->prepare('SELECT idReservation, dateDebut, dateFin, vehicule.marque, vehicule.modele, utilisateur.nom, utilisateur.prenom, utilisateur.nomUser
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
            du <?php echo $reservation['dateDebut']; ?> au <?php echo $reservation['dateFin']; ?></p>
            
            <?php
            if($reservation['nomUser'] == $_SESSION['username']){
                echo'<a href="deleteReservation.php?idReservation='.$reservation['idReservation'].'"><button>Retirer</button></a></div>';
            }
        }

    }
    
    

    ?>



    <a href="ajouterReservation.php"><button>Ajouter Reservation</button></a>
</body>
</html>