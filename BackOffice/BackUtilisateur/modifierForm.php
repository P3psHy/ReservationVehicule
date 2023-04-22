<?php

require_once "../../connection.php";

$sqlUser=$connection ->prepare('SELECT * FROM utilisateur WHERE idUser = :id');
$sqlUser->bindParam(":id", $_REQUEST['id']);

$sqlUser->execute();

$ligneUser = $sqlUser->fetchall();
foreach($ligneUser as $user){
    ?>
    <h2>Modification de l'utilisateur: <?php echo $user['prenom']." ". $user['nom'] ?></h2>
    <form action="modifier.php" method="get">

        <div>
            <label for="">Nom</label>
            <input type="text" name="nom" value="<?php echo $user['nom']; ?>" required>
        </div>

        <div>
            <label for="">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $user['prenom']; ?>">
        </div>

        <div>
            <label for="">Permis de conduire</label>
            <select name="aPermis" id="">
                <?php
                if($user['aPermis']=='0'){
                    echo'<option value="0" selected>Non</option>';
                    echo'<option value="1">Oui</option>';
                }else{
                    echo'<option value="0">Non</option>';
                    echo'<option value="1" selected>Oui</option>';
                }

                ?>
            </select>
        </div>

        <input type="text" name ="idUser" value="<?php echo $_REQUEST['id'] ?>" hidden>
        <input type="text" name ="id" value="1" hidden>



        <button type="submit">Modifier</button>
        <button type="reset">Annuler</button>
    </form>
    <a href="listeUtilisateur.php"><button>retour</button></a>

    <?php
}

?>