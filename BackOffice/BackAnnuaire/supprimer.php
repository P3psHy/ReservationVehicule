<?php

switch ($_REQUEST['id']) {
    case '1': //Fonctionnel Mettre en place un trigger pour supprimer tous les membres du groupe

        require_once "../../connection.php";

        $sqlSupprGroupe=$connection ->prepare('DELETE FROM groupes WHERE id=:idGroupe');
        $sqlSupprGroupe->bindParam(":idGroupe", $_REQUEST['idGroupe']);

        $sqlSupprGroupe->execute();

        header("Location: listeGroupe.php");


        break;
    
    case '2': //Fonctionnel

        require_once "../../connection.php";

        $sqlSupprPersonne=$connection ->prepare('DELETE FROM personnes WHERE id=:id');
        $sqlSupprPersonne->bindParam(":id", $_REQUEST['idPersonne']);

        $sqlSupprPersonne->execute();

        header("Location: listeGroupe.php");

        break;
    
    default:
        echo "erreur";
        break;
}





?>