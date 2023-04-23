<?php

require_once "../../connection.php";

$sqlVehicule=$connection ->prepare('SELECT * FROM vehicule WHERE idVehicule = :id');
$sqlVehicule->bindParam(":id", $_REQUEST['id']);

$sqlVehicule->execute();

$ligneVehicule = $sqlVehicule->fetchall();
foreach($ligneVehicule as $vehicule){
    ?>
    <h2>Modification du véhicule: <?php echo $vehicule['marque']." ". $vehicule['modele'] ?></h2>
    <form action="modifier.php" method="get">

        <div>
            <label for="">Nom</label>
            <input type="text" name="marque" value="<?php echo $vehicule['marque']; ?>" required>
        </div>

        <div>
            <label for="">Prénom</label>
            <input type="text" name="modele" value="<?php echo $vehicule['modele']; ?>" required>
        </div>

        <input type="text" name ="id" value="<?php echo $_REQUEST['id'] ?>" hidden>




        <button type="submit">Modifier</button>
        <button type="reset">Annuler</button>
    </form>
    <a href="listeVehicule.php"><button>retour</button></a>

    <?php
}

?>