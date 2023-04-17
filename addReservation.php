<?php
session_start();
    require_once "connection.php";


    $sqlPersonne=$connection ->prepare('SELECT idUser FROM utilisateur WHERE nomUser = :user');
    $sqlPersonne->bindParam(":user", $_SESSION['username']);

    $sqlPersonne->execute();

    $sqlPersonne->debugDumpParams();

    $lignePersonne = $sqlPersonne->fetchall();
    $idUser;
    foreach($lignePersonne as $personne){
        $idUser= $personne['idUser'];
    }
    echo"<br><br><br>";

    //Vérifier si la date n'a pas déjà été prise par une autre réservation

    $sqlReservation=$connection ->prepare('INSERT INTO reservation(dateDebut, dateFin, idUser, idVehicule) VALUES (:dateDebut, :dateFin, :idUser, :idVehicule);');

    $sqlReservation->bindParam(":dateDebut", $_REQUEST['dateDebut']);
    $sqlReservation->bindParam(":dateFin", $_REQUEST['dateFin']);
    $sqlReservation->bindParam(":idUser", $idUser);
    $sqlReservation->bindParam(":idVehicule", $_REQUEST['idVehicule']);

    $sqlReservation->execute();
    $sqlReservation->debugDumpParams();
    
    if($sqlReservation){
        header("location: reservation.php");
    }else{
        echo"erreur";
    }








?>