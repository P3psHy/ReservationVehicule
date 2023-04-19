<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Groupe Annuaire</title>
</head>
<body>
    <h2>Liste des personnes appartenant au groupe: xx</h2>
    <?php

    require_once "../../connection.php";


    $sqlGroupe=$connection ->prepare('SELECT * FROM personnes WHERE groupeId = :idGroupe');
    $sqlGroupe->bindParam(":idGroupe", $_REQUEST['idGroupe']);

    $sqlGroupe->execute();

    $ligneGroupe = $sqlGroupe->fetchall();
    foreach($ligneGroupe as $groupe){
        ?>
        <div style="margin-bottom:10px;">
            <label><?php echo $groupe['nom']; ?></label>
            <a href="blank"><button>Modifier</button></a>
            <a href="supprimer.php?id=2&idPersonne=<?php echo $groupe['id'] ?>"><button>Supprimer</button></a>

        </div>
        <?php
    }




    ?>
    <a href="ajouterForm.php?id=2&idGroupe=<?php echo $_REQUEST['idGroupe']; ?>"><button>Ajouter une personne</button></a>
    <a href="listeGroupe.php"><button>Retour</button></a>
</body>
</html>