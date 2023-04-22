<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body>

        <h2>Ajouter un utilisateur</h2>
        <form action="ajouter.php" method="get">

            <div>
                <label for="">Nom</label>
                <input type="text" name="nom" required>
            </div>

            <div>
                <label for="">Prenom</label>
                <input type="text" name="prenom" required>
            </div>

            <div>
                <label for="">Mot de passe</label>
                <input type="password" name="psw" required> 
            </div>

            <select name="aPermis" id="aPermis">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>



            <button type="submit">Ajouter</button>
            <button type="reset">Annuler</button>
        </form>
        <a href="listeGroupe.php"><button>retour</button></a>
        <?php

