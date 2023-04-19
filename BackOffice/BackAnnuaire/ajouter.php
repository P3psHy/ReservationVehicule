<?php

switch ($_REQUEST['id']) {
    case '1': //Fonctionnel

        require_once "../../connection.php";

        $sqlAjoutGroupe=$connection ->prepare('INSERT INTO groupes(nom, telephone, mail) VALUES (:nom, :telephone, :mail)');
        $sqlAjoutGroupe->bindParam(":nom", $_REQUEST['nom']);
        $sqlAjoutGroupe->bindParam(":telephone", $_REQUEST['telephone']);
        $sqlAjoutGroupe->bindParam(":mail", $_REQUEST['mail']);

        $sqlAjoutGroupe->execute();

        header("Location: listeGroupe.php");


        break;
    
    case '2': //Fonctionnel

        require_once "../../connection.php";

        $sqlAjoutPersonne=$connection ->prepare('INSERT INTO personnes(nom, telephone, mail, groupeId) VALUES (:nom, :telephone, :mail, :groupeId)');
        $sqlAjoutPersonne->bindParam(":nom", $_REQUEST['nom']);
        $sqlAjoutPersonne->bindParam(":telephone", $_REQUEST['telephone']);
        $sqlAjoutPersonne->bindParam(":mail", $_REQUEST['mail']);
        $sqlAjoutPersonne->bindParam(":groupeId", $_REQUEST['idGroupe']);

        $sqlAjoutPersonne->execute();

        header("Location: listeGroupe.php");


        break;
    
    default:
        echo "erreur";
        break;
}





?>