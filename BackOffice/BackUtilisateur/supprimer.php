<?php

require_once "../../connection.php";

    $sqlSupprUser=$connection ->prepare('DELETE FROM utilisateur WHERE idUser=:id');
    $sqlSupprUser->bindParam(":id", $_REQUEST['id']);

    $sqlSupprUser->execute();

    header("Location: listeUtilisateur.php");




?>