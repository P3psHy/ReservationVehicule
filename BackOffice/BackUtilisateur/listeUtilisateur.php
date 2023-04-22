<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Utilisateurs</title>
</head>
<body>
    <h2>Liste des Utilisateurs</h2>
    <?php

    require_once "../../connection.php";


    $sqlUser=$connection ->prepare('SELECT idUser, nom, prenom FROM utilisateur;');

    $sqlUser->execute();

    $ligneUser = $sqlUser->fetchall();
    foreach($ligneUser as $user){
        ?>
        <div style="margin-bottom:10px;">
            <label>Utilisateur: <?php echo $user['prenom']." ".$user['nom']; ?></label>
            <a href="modifierForm.php?id=<?php echo$user['idUser'] ?>"><button>Modifier</button></a>
            <a href="supprimer.php?id=<?php echo $user['idUser'] ?>"><button>Supprimer</button></a>

        </div>
        <?php
    }




    ?>
    <a href="ajouterForm.php"><button>Ajouter un utilisateur</button></a>
    <a href="../BackOffice.php"><button>Retour</button></a>
</body>
</html>