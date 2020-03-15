<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Angle </title>
</head>
<body>
    <?php 
        
       include 'conect.php';

       $SelectLang = $bdPdo ->query('SELECT * FROM Langue');

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);

            $Angle = $bdPdo->prepare('SELECT * FROM angle WHERE NumAngl ="'.$get_id.'"');
            $Angle->execute(
                array($get_id)
            );

            if($Angle->rowCount() == 1){
                $Angle =$Angle->fetch();
                $NumAngl = $Angle['NumAngl'];
                $LibAngl = $Angle['LibAngl'];
                $NumLang = $Angle['NumLang'];

            }else{
                die('Cette Angle n\'existe pas !');
            }
        }else{
            echo('<a href="vewAngle.php">Retour</a>'); 
            die('ERREUR');
        }

        if($_SERVER["REQUEST_METHOD"] == "GET"){
		
              
				if (((isset($_GET['NumAngl'])) AND !empty($_GET['NumAngl']))
                AND ((isset($_GET['LibAngl'])) AND !empty($_GET['LibAngl']))
             ) {
                    $erreur = false;
                 				
                    $NumAngl = htmlspecialchars($_GET['NumAngl']);
                    $LibAngl = htmlspecialchars($_GET['LibAngl']);
                   

                    try{
                        //Début transaction
                        $bdPdo->beginTransaction();
                        // preparation de la requete Preparee dans une chane de caractere
                        // instruction incert Preparation
                        $query = $bdPdo->prepare('UPDATE angle SET NumAngl = :NumAngl, LibAngl = :LibAngl WHERE  NumAngl ="'.$get_id.'"');
                        // Execution du prepare lancement
                        $query->execute(
                            array(
                                ':NumAngl'=> $NumAngl,
                                ':LibAngl'=> $LibAngl,
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
                    echo"Requete <b>update</b> a remplacé les valeurs de" . $NumAngl . "!";
                    echo"<br />";
               

                }
            }
                   

                include 'disconect.php';
        
        ?>
    
            <h2>Modifier l'Angle <?= $NumAngl?> </h2>
            <form action="editAngle.php" name="formAngle" method="Get">

            <input type="hidden" name="id" value="<?= $NumAngl ?>">
    
        <input type="hidden" name="NumAngl" maxlength="25" id="" value="<?= $NumAngl ?>" ><br>

        <label for="">Angle</label>
        <input type="text" name="LibAngl" maxlength="25" id="" value="<?= $LibAngl ?>" ><br>

        <p>Dans la langue :<?= $NumLang ?></p>

        

        <input type="submit" name="Submit" value="Validé">
    </form>
            <a href="vewAngle.php">Retour</a>
        </div>

</body>
</html>