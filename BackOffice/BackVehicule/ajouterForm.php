<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body>

        <h2>Ajouter un véhicule</h2>
        <form action="ajouter.php" method="get">

            <div>
                <label for="">Marque</label>
                <input type="text" name="marque" required>
            </div>

            <div>
                <label for="">Modèle</label>
                <input type="text" name="modele" required>
            </div>

            <button type="submit">Ajouter</button>
            <button type="reset">Annuler</button>
        </form>
        <a href="listeVehicule.php"><button>retour</button></a>
        <?php

