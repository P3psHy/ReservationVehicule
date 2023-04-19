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
            <label for="">Mot de passe</label><br>
            <input id="psw" name="psw" type="password" placeholder="mot de passe" onchange="verifUsername()"><br/>
        </div>

        <input type="text" name="mail" value="<?php echo $_REQUEST['mail']?>" hidden>

        <div><button type="submit">Suivant</button></div>
        <button type="reset">Annuler</button>
        <a href="connexionMail.php"><button>Retour</button>
    </form>

    <script src="jsConnexion.js"></script>
</body>
</html>