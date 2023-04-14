<?php
    require_once "connection.php";

    $sqlPersonne=$connection ->prepare('SELECT nomUser, psw FROM utilisateur WHERE nomUser = :user');
    $sqlPersonne->bindParam(":user", $_SESSION['username']);

    $sqlPersonne->execute();

    $lignePersonne = $sqlPersonne->fetchall();
    $idUser;
    foreach($lignePersonne as $personne){
        $idUser= $personne['idUser'];
    }


    $sqlReservation=$connection ->prepare('INSERT INTO reservation(\'dateDebut\',\'dateFin\',\'idUser\',\'idVehicule\') VALUES (:dateDebut,:dateFin,:idUser,:idVehicule,)');

    $sqlReservation->bindParam(":dateDebut", $_REQUEST['dateDebut']);
    $sqlReservation->bindParam(":dateFin", $_REQUEST['dateFin']);
    $sqlReservation->bindParam(":idUser", $idUser);
    $sqlReservation->bindParam(":idVehicule", $_REQUEST['idVehicule']);



    $sqlReservation->execute();
    $ligneReservation = $sqlReservation->fetchall();


    foreach($ligneReservation as $reservation){
    }






?>