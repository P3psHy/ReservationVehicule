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
    //formulaire ajouter groupe
    case "1":

        

        ?>
        
        <h2>Ajouter un groupe</h2>
        <form action="ajouter.php" method="get">

            <div>
                <label for="">Nom</label>
                <input type="text" name="nom" required>
            </div>

            <div>
                <label for="">Mail</label>
                <input type="text" name="mail" value="">
            </div>

            <div>
                <label for="">Téléphone</label>
                <input type="text" name="telephone" value="">
            </div>


            <input type="text" name ="id" value="1" hidden>


            <button type="submit">Ajouter</button>
            <button type="reset">Annuler</button>
        </form>
        <a href="listeGroupe.php"><button>retour</button></a>
        <?php
        break;


    case "2":

    

        ?>
        
        <h2>Ajouter une personne</h2>
        <form action="ajouter.php" method="get">

            <div>
                <label for="">Nom</label>
                <input type="text" name="nom" required>
            </div>

            <div>
                <label for="">Mail</label>
                <input type="text" name="mail" value="">
            </div>

            <div>
                <label for="">Téléphone</label>
                <input type="text" name="telephone" value="">
            </div>          

            <input type="text" name ="idGroupe" value="<?php echo $_REQUEST['idGroupe'] ?>" hidden>
            <input type="text" name ="id" value="2" hidden>


            <button type="submit">Ajouter</button>
            <button type="reset">Annuler</button>
        </form>
        <a href="listePersonne.php?idGroupe=<?php echo $_REQUEST['idGroupe'] ?>"><button>retour</button></a>
        <?php
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