<?php
session_start();
    require_once "connection.php";

    echo"<br><br><br>";

    //Vérifier si la date n'a pas déjà été prise par une autre réservation

    $sqlReservation=$connection ->prepare('DELETE FROM reservation WHERE idReservation = :idReservation');

    $sqlReservation->bindParam(":idReservation", $_REQUEST['idReservation']);


    $sqlReservation->execute();
    $sqlReservation->debugDumpParams();
    
    if($sqlReservation){
        echo"ok";
        header("location: reservation.php");
    }else{
        echo"erreur";
    }








?>