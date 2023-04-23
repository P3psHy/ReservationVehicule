<?php

        require_once "../../connection.php";

        $sqlModifGroupe=$connection ->prepare('UPDATE vehicule SET marque=:marque, modele=:modele WHERE idVehicule=:id');
        $sqlModifGroupe->bindParam(":marque", $_REQUEST['marque']);
        $sqlModifGroupe->bindParam(":modele", $_REQUEST['modele']);
        $sqlModifGroupe->bindParam(":id", $_REQUEST['id']);


        $sqlModifGroupe->execute();
        $sqlModifGroupe->debugDumpParams();

        header("Location: listeVehicule.php");



?>