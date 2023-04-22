<?php

//Former automatiquement le nom de l'utilisateur (permet de régler les problèmes des noms contenant des espace)
$nomUser = $_REQUEST['prenom'].'.'.$_REQUEST['nom'];
$nomUser = strtolower(str_replace(" ","-",$nomUser));


//fonctionnel
require_once "../../connection.php";

$sqlAjoutUser=$connection ->prepare('INSERT INTO utilisateur(nom, prenom, psw, aPermis, nomUser) VALUES (:nom, :prenom, :psw, :aPermis, :nomUser)');
$sqlAjoutUser->bindParam(":nom", $_REQUEST['nom']);
$sqlAjoutUser->bindParam(":prenom", $_REQUEST['prenom']);
$sqlAjoutUser->bindParam(":psw", $_REQUEST['psw']);
$sqlAjoutUser->bindParam(":aPermis", $_REQUEST['aPermis']);
$sqlAjoutUser->bindParam(":nomUser", $nomUser);

$sqlAjoutUser->execute();
$sqlAjoutUser->debugDumpParams();


header("Location: listeUtilisateur.php");





?>