<?php

switch ($_REQUEST['id']) {
    //changer information user
    case '1': //Fonctionnel

        //Former automatiquement le nom de l'utilisateur (permet de régler les problèmes des noms et prénoms contenant des espace)
        $nomUser = $_REQUEST['prenom'].'.'.$_REQUEST['nom'];
        $nomUser = strtolower(str_replace(" ","-",$nomUser));

        require_once "../../connection.php";

        $sqlModifGroupe=$connection ->prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, aPermis=:aPermis, nomUser=:nomUser WHERE idUser=:idUser');
        $sqlModifGroupe->bindParam(":nom", $_REQUEST['nom']);
        $sqlModifGroupe->bindParam(":prenom", $_REQUEST['prenom']);
        $sqlModifGroupe->bindParam(":aPermis", $_REQUEST['aPermis']);
        $sqlModifGroupe->bindParam(":nomUser", $nomUser);
        $sqlModifGroupe->bindParam(":idUser", $_REQUEST['idUser']);


        $sqlModifGroupe->execute();
        $sqlModifGroupe->debugDumpParams();

        header("Location: listeUtilisateur.php");


        break;
    
    //Changer le mot de passe d'un utilisateur
    case '2': //fonctionnel

        require_once "../../connection.php";

        

        $sqlModifPersonne=$connection ->prepare('UPDATE utilisateur SET psw=:psw WHERE idUser=:idUser');
        $sqlModifPersonne->bindParam(":psw", $_REQUEST['psw']);
        $sqlModifPersonne->bindParam(":idUser", $_REQUEST['idUser']);
        

        $sqlModifPersonne->execute();
        $sqlModifPersonne->debugDumpParams();




        header("Location: listeGroupe.php");


        break;
    
    default:
        echo "erreur";
        break;
}





?>