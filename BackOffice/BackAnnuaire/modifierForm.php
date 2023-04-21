<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>
<body>
<?php


switch ($_REQUEST['id']) {
    case "1":    //formulaire modifier groupe

        require_once "../../connection.php";


        $sqlGroupe=$connection ->prepare('SELECT * FROM groupes WHERE id = :idGroupe');
        $sqlGroupe->bindParam(":idGroupe", $_REQUEST['idGroupe']);
    
        $sqlGroupe->execute();

        $ligneGroupe = $sqlGroupe->fetchall();
        foreach($ligneGroupe as $groupe){
            ?>
            <h2>Modification du groupe: <?php echo $groupe['nom'] ?></h2>
            <form action="modifier.php" method="get">

                <div>
                    <label for="">Nom</label>
                    <input type="text" name="nom" value="<?php echo $groupe['nom']; ?>" required>
                </div>

                <div>
                    <label for="">Mail</label>
                    <input type="text" name="mail" value="<?php echo $groupe['mail']; ?>">
                </div>

                <div>
                    <label for="">Téléphone</label>
                    <input type="text" name="telephone" value="<?php echo $groupe['telephone']; ?>">
                </div>

                <input type="text" name ="idGroupe" value="<?php echo $_REQUEST['idGroupe'] ?>" hidden>
                <input type="text" name ="id" value="1" hidden>


                <button type="submit">Modifier</button>
                <button type="reset">Annuler</button>
            </form>
            <a href="listeGroupe.php"><button>retour</button></a>

            <?php
        }


        break;


    case "2": 

        require_once "../../connection.php";


        $sqlPersonne=$connection ->prepare('SELECT * FROM personnes WHERE id = :id');
        $sqlPersonne->bindParam(":id", $_REQUEST['idPersonne']);
    
        $sqlPersonne->execute();

        $lignePersonne = $sqlPersonne->fetchall();
        foreach($lignePersonne as $personne){

        ?>
        
        <h2>Modifier le profil de: <?php echo $personne['nom']; ?></h2>
        <form action="modifier.php" method="get">

            <div>
                <label for="">Nom</label>
                <input type="text" name="nom" value="<?php echo $personne['nom'];?>" required>
            </div>

            <div>
                <label for="">Mail</label>
                <input type="text" name="mail"value="<?php echo $personne['mail'];?>">
            </div>

            <div>
                <label for="">Téléphone</label>
                <input type="text" name="telephone" value="<?php echo $personne['telephone'];?>">
            </div>

            <div>
                <label for="">Groupe</label>
                <select name="groupeId" id="">
                    
                    <?php
                    $sqlGroupe=$connection ->prepare('SELECT * FROM groupes');
                
                    $sqlGroupe->execute();
            
                    $ligneGroupe = $sqlGroupe->fetchall();
                    foreach($ligneGroupe as $groupe){

                        if($personne['groupeId'] == $groupe['id']){
                            echo '<option value="'.$groupe['id'].'" selected>'.$groupe['nom'].'</option>';
                        }else{
                            echo '<option value="'.$groupe['id'].'">'.$groupe['nom'].'</option>';
                        }

                        
                    }

                    ?>
                </select>
            </div>

            <input type="text" name ="idPersonne" value="<?php echo $personne['id'] ?>" hidden>
            <input type="text" name ="id" value="2" hidden>


            <button type="submit">Modifier</button>
            <button type="reset">Annuler</button>
        </form>
        <a href="listePersonne.php?idGroupe=<?php echo $personne['groupeId'] ?>"><button>retour</button></a>
        <?php

        }

        break;
    
    default:
        ?>
        <span>erreur</span>
        <?php
        break;
}
?>





    
</body>
</html>