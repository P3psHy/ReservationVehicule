<?php

switch ($_REQUEST['id']) {
    case '1': //Fonctionnel

        require_once "../../connection.php";

        $sqlModifGroupe=$connection ->prepare('UPDATE groupes SET nom=:nom, telephone=:telephone, mail=:mail WHERE id=:idGroupe');
        $sqlModifGroupe->bindParam(":nom", $_REQUEST['nom']);
        $sqlModifGroupe->bindParam(":telephone", $_REQUEST['telephone']);
        $sqlModifGroupe->bindParam(":mail", $_REQUEST['mail']);
        $sqlModifGroupe->bindParam(":idGroupe", $_REQUEST['idGroupe']);

        $sqlModifGroupe->execute();
        $sqlModifGroupe->debugDumpParams();

        header("Location: listeGroupe.php");


        break;
    
    case '2': //Fonctionnel

        require_once "../../connection.php";

        $sqlModifPersonne=$connection ->prepare('INSERT INTO personnes(nom, telephone, mail, groupeId) VALUES (:nom, :telephone, :mail, :groupeId)');
        $sqlModifPersonne->bindParam(":nom", $_REQUEST['nom']);
        $sqlModifPersonne->bindParam(":telephone", $_REQUEST['telephone']);
        $sqlModifPersonne->bindParam(":mail", $_REQUEST['mail']);
        $sqlModifPersonne->bindParam(":groupeId", $_REQUEST['idGroupe']);

        $sqlModifPersonne->execute();

        header("Location: listeGroupe.php");


        break;
    
    default:
        echo "erreur";
        break;
}





?>