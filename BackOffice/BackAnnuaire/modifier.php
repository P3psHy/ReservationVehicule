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
    
    case '2': //fonctionnel

        require_once "../../connection.php";

        

        $sqlModifPersonne=$connection ->prepare('UPDATE personnes SET nom=:nom, mail=:mail, telephone=:telephone, groupeId=:groupeId WHERE id=:idPersonne');
        $sqlModifPersonne->bindParam(":nom", $_REQUEST['nom']);
        $sqlModifPersonne->bindParam(":mail", $_REQUEST['mail']);
        $sqlModifPersonne->bindParam(":telephone", $_REQUEST['telephone']);
        $sqlModifPersonne->bindParam(":groupeId", $_REQUEST['groupeId']);
        $sqlModifPersonne->bindParam(":idPersonne", $_REQUEST['idPersonne']);

        $sqlModifPersonne->execute();
        $sqlModifPersonne->debugDumpParams();




        header("Location: listeGroupe.php");


        break;
    
    default:
        echo "erreur";
        break;
}





?>