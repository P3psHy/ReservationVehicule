<?php

require_once "../../connection.php";

$sqlUser=$connection ->prepare('SELECT * FROM utilisateur WHERE idUser = :id');
$sqlUser->bindParam(":id", $_REQUEST['id']);

$sqlUser->execute();

$ligneUser = $sqlUser->fetchall();
foreach($ligneUser as $user){
    ?>
    <h2>Modification du Mot de passe de l'utilisateur: <?php echo $user['prenom']." ". $user['nom'] ?></h2>
    <form action="modifier.php" method="get">

        <div>
            <label for="">Nouveau mot de passe</label>
            <input type="text" name="psw" required>
        </div>

        <input type="text" name ="idUser" value="<?php echo $_REQUEST['id'] ?>" hidden>
        <input type="text" name ="id" value="2" hidden>



        <button type="submit">Modifier</button>
        <button type="reset">Annuler</button>
    </form>
    <a href="listeUtilisateur.php"><button>retour</button></a>

    <?php
}

?>