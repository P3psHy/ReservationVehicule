<?php

switch ($_REQUEST['id']) {
    case '1': //

        require_once "../../connection.php";

        $sqlAjoutGroupe=$connection ->prepare('DELETE FROM groupes WHERE id=:idGroupe');
        $sqlAjoutGroupe->bindParam(":idGroupe", $_REQUEST['idGroupe']);

        $sqlAjoutGroupe->execute();


        break;
    
    case '2': //

        require_once "../../connection.php";

        $sqlAjoutPersonne=$connection ->prepare('INSERT INTO personnes(nom, telephone, mail, groupeId) VALUES (:nom, :telephone, :mail, :groupeId)');
        $sqlAjoutPersonne->bindParam(":nom", $_REQUEST['nom']);
        $sqlAjoutPersonne->bindParam(":telephone", $_REQUEST['telephone']);
        $sqlAjoutPersonne->bindParam(":mail", $_REQUEST['mail']);
        $sqlAjoutPersonne->bindParam(":groupeId", $_REQUEST['idGroupe']);

        $sqlAjoutPersonne->execute();
        $sqlAjoutPersonne->debugDumpParams();

        break;
    
    default:
        echo "erreur";
        break;
}





?>