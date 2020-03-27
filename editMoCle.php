<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Editer Mot Clé</title>
</head>
<body>
    <?php

       include 'conect.php';

       $SelectLang = $bdPdo ->query('SELECT * FROM Langue');

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);

            $motcle = $bdPdo->prepare('SELECT * FROM MOTCLE WHERE NumMoCle ="'.$get_id.'"');
            $motcle->execute(
                array($get_id)
            );

            if($motcle->rowCount() == 1){
                $motcle =$motcle->fetch();
                $NumMoCle = $motcle['NumMoCle'];
                $LibMoCle = $motcle['LibMoCle'];
                $NumLang = $motcle['NumLang'];

            }else{
                die('Ce mot clé n\'existe pas !');
            }
        }else{
            echo('<a href="vewMot.php">Retour</a>');
            die('ERREUR');
        }



        if (((isset($_GET['NumMoCle'])) AND !empty($_GET['NumMoCle']))
        AND ((isset($_GET['LibMoCle'])) AND !empty($_GET['LibMoCle']))
        ) {
            $erreur = false;

            $NumMoCle = htmlspecialchars($_GET['NumMoCle']);
            $LibMoCle = htmlspecialchars($_GET['LibMoCle']);


            try{
                //Début transaction
                $bdPdo->beginTransaction();
                // preparation de la requete Preparee dans une chane de caractere
                // instruction incert Preparation
                $query = $bdPdo->prepare('UPDATE motcle SET NumMoCle = :NumMoCle, LibMoCle = :LibMoCle WHERE  NumMoCle ="'.$get_id.'"');
                // Execution du prepare lancement
                $query->execute(
                    array(
                        ':NumMoCle'=> $NumMoCle,
                        ':LibMoCle'=> $LibMoCle,
                    )
                );

                // commite de la transaction (confirm insert)
                $bdPdo->commit();

            }catch( PDOException $e ){
                //rollBack  (annule Insert)
            $bdPdo->rollBack();
            }

            //liberer le curseur
            $query->closeCursor();

            // affichage des messsages d'erreur et/ou d'envoie
            echo"Requête <b>update</b> a remplacé les valeurs de" . $NumMoCle . "!";
            echo"<br />";


        }



                include 'disconect.php';

        ?>

            <h2>Modifier le Mot clé numéro :<?= $NumMoCle?> </h2>
            <form action="editMoCle.php" name="formMoCle" method="get">

            <input type="hidden"  name="id" value="<?= $NumMoCle ?>">
            <input type="hidden"  name="NumMoCle" value="<?= $NumMoCle ?>">

        <label for="">Mot Clé</label>
        <input type="text" name="LibMoCle" placeholder="max 25 char." maxlength="25" id="" value="<?= $LibMoCle ?>" ><br>

        <p>Dans la langue : <?= $NumLang ?></p>



        <input type="submit" name="Submit" value="Validé">
    </form>
            <a href="vewMot.php">Retour</a>
        </div>

</body>
</html>
