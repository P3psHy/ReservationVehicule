<?php

$nomUser = $_REQUEST['prenom'].'.'.$_REQUEST['nom'];


$nomUser = strtolower(str_replace(" ","-",$nomUser));


//
require_once "../../connection.php";

$sqlAjoutUser=$connection ->prepare('INSERT INTO utilisateur(nom, prenom, psw, aPermis, nomUser) VALUES (nom=:nom, prenom=:prenom, psw=:psw, aPermis=:aPermis, nomUser=:nomUser)');
$sqlAjoutUser->bindParam(":nom", $_REQUEST['nom']);
$sqlAjoutUser->bindParam(":prenom", $_REQUEST['prenom']);
$sqlAjoutUser->bindParam(":psw", $_REQUEST['psw']);
$sqlAjoutUser->bindParam(":aPermis", $_REQUEST['aPermis']);
$sqlAjoutUser->bindParam(":nomUser", $nomUser);

$sqlAjoutUser->execute();
$sqlAjoutUser->debugDumpParams();


//header("Location: listeGroupe.php");





?>