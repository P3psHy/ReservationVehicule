<?php

session_start();
require_once "connection.php";

$sqlPersonne=$connection ->prepare('SELECT nomUser, psw FROM utilisateur WHERE nomUser = :user');
$sqlPersonne->bindParam(":user", $_REQUEST['username']);

$sqlPersonne->execute();

$lignePersonne = $sqlPersonne->fetchall();


foreach($lignePersonne as $personne){
    if($_REQUEST['psw'] == $personne['psw']){
        echo "Ok";
        header("Location: reservation.php");

    }else{
        echo "Pas Ok";
        header("Location: index.php");

    }
}





?>