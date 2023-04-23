<?php

//fonctionnel
require_once "../../connection.php";

$sqlAjoutUser=$connection ->prepare('INSERT INTO vehicule(marque, modele) VALUES (:marque, :modele)');
$sqlAjoutUser->bindParam(":marque", $_REQUEST['marque']);
$sqlAjoutUser->bindParam(":modele", $_REQUEST['modele']);

$sqlAjoutUser->execute();
$sqlAjoutUser->debugDumpParams();


header("Location: listeVehicule.php");





?>