



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOffice</title>
</head>
<body>
    <h2>Connexion Administrateur</h2>
    <form action="verifCompte.php" method="get">
        <div>
            <label for="">adresse Mail</label><br>
            <input id="mail" name="mail" type="text" placeholder="prenom.nom" onchange="verifUsername()"><br/>
        </div>


        <div><button type="submit">Suivant</button></div>
        <button type="reset">Annuler</button>
        <a href="<../index.php"><button>Retour</button>
    </form>

    <script src="jsConnexion.js"></script>
</body>
</html>