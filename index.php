<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Véhicule</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="verifCompte.php" method="get">
        <div>
            <label for="">Nom utilisateur</label><br>
            <input id="username" name="username" type="text" placeholder="prenom.nom" onchange="verifUsername()"><br/>
        </div>

        <br>
        <div>
            <label for="">Mot de passe</label><br>
            <input name="psw" type="text" placeholder="mot de passe">
        </div>
        

        <p>Si vous avez oubliez votre mot de passe, veuillez contacter la Maintenance-SI en donnant votre nouveau mot de passe.</p>
        
        <div><button type="submit">Connexion</button></div>
    </form>

    <script src="jsConnexion.js"></script>
</body>
</html>