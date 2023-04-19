<?php

session_start();
require_once "../connection.php";

$sqlPersonne=$connection ->prepare('SELECT * FROM administrateur WHERE mail = :mail;');
$sqlPersonne->bindParam(":mail", $_REQUEST['mail']);

$sqlPersonne->execute();
$sqlPersonne->debugDumpParams();
if($sqlPersonne->rowCount() == 0){
    echo"email faux";
    //header('Location: connexionMail.php');
}else{


?>




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
    <form action="verifAdmin.php" method="get">
        <div>
            <label for="">Mot de passe</label><br>
            <input id="psw" name="psw" type="password" placeholder="mot de passe" onchange="verifUsername()"><br/>
        </div>

        <input type="text" name="mail" value="<?php echo $_REQUEST['mail']?>" hidden>

        <div><button type="submit">Suivant</button></div>
        <button type="reset">Annuler</button>
        
    </form>
    <a href="connexionMail.php"><button>Retour</button>
    <script src="jsConnexion.js"></script>
</body>
</html>

<?php
}

?>