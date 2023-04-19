<?php

session_start();
require_once "../connection.php";

$sqlPersonne=$connection ->prepare('SELECT * FROM administrateur WHERE mail = :mail;');
$sqlPersonne->bindParam(":mail", $_REQUEST['mail']);

$sqlPersonne->execute();

$lignePersonne = $sqlPersonne->fetchall();

foreach($lignePersonne as $personne){
    if($_REQUEST['psw'] == $personne['psw']){
        echo "Ok";
        $_SESSION['username']= $_REQUEST['mail'];
    
        header("Location: BackOffice.php");

    }else{
        echo "Pas Ok";
        header("Location: connexionPsw.php");

    }
}
header("Location: connexionPsw.php?mail=".$_REQUEST['mail']);




?>