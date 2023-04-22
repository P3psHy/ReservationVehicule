<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Groupe Annuaire</title>
</head>
<body>
    <h2>Liste des groupes</h2>
    <?php

    require_once "../../connection.php";


    $sqlGroupe=$connection ->prepare('SELECT * FROM groupes;');

    $sqlGroupe->execute();

    $ligneGroupe = $sqlGroupe->fetchall();
    foreach($ligneGroupe as $groupe){
        ?>
        <div style="margin-bottom:10px;">
            <label>Groupe: <?php echo $groupe['nom']; ?></label>
            <a href="listePersonne.php?idGroupe=<?php echo$groupe['id'] ?>"><button>Afficher membres</button></a>
            <a href="modifierForm.php?id=1&idGroupe=<?php echo$groupe['id'] ?>"><button>Modifier</button></a>
            <a href="supprimer.php?id=1&idGroupe=<?php echo $groupe['id'] ?>"><button>Supprimer</button></a>

        </div>
        <?php
    }




    ?>
    <a href="ajouterForm.php?id=1"><button>Ajouter un groupe</button></a>
    <a href="../BackOffice.php"><button>Retour</button></a>
</body>
</html>