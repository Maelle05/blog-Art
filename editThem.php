<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Thématique</title>
</head>
<body>
    <?php 
        
       include 'conect.php';

       $SelectLang = $bdPdo ->query('SELECT * FROM Langue');

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);

            $Thematique = $bdPdo->prepare('SELECT * FROM thematique WHERE NumThem ="'.$get_id.'"');
            $Thematique->execute(
                array($get_id)
            );

            if($Thematique->rowCount() == 1){
                $Thematique =$Thematique->fetch();
                $NumThem = $Thematique['NumThem'];
                $LibThem = $Thematique['LibThem'];
                $NumLang = $Thematique['NumLang'];

            }else{
                die('Cette Thématique n\'existe pas !');
            }
        }else{
            echo('<a href="vewThem.php">Retour</a>'); 
            die('ERREUR');
        }

        if($_SERVER["REQUEST_METHOD"] == "GET"){
		
              
				if (((isset($_GET['NumThem'])) AND !empty($_GET['NumThem']))
                AND ((isset($_GET['LibThem'])) AND !empty($_GET['LibThem']))
                AND ((isset($_GET['NumLang'])) AND !empty($_GET['NumLang']))
             ) {
                    $erreur = false;
                 				
                    $NumThem = htmlspecialchars($_GET['NumThem']);
                    $LibThem = htmlspecialchars($_GET['LibThem']);
                    $NumLang = htmlspecialchars($_GET['NumLang']);
                   

                    try{
                        //Début transaction
                        $bdPdo->beginTransaction();
                        // preparation de la requete Preparee dans une chane de caractere
                        // instruction incert Preparation
                        $query = $bdPdo->prepare('UPDATE thematique SET NumThem = :NumThem, LibThem = :LibThem, NumLang = :NumLang WHERE  NumThem ="'.$get_id.'"');
                        // Execution du prepare lancement
                        $query->execute(
                            array(
                                ':NumThem'=> $NumThem,
                                ':LibThem'=> $LibThem,
                                ':NumLang'=> $NumLang
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
                    echo"Requete <b>update</b> a remplacé les valeurs de" . $NumThem . "!";
                    echo"<br />";
               

                }
            }
                   

                include 'disconect.php';
        
        ?>
    
            <h2>Modifier la thématique <?= $NumThem?> </h2>
            <form action="editThem.php" name="formThem" method="Get">

            <input type="hidden" name="id" value="<?= $NumThem ?>">

        <label for="">Thématique</label>
        <input type="text" name="LibThem" maxlength="25" id="" value="<?= $LibThem ?>" ><br>

        <label for="">Quelle langue ?</label>
        <select name="NumLang" >   
                    <option value="<?= $NumLang ?>"><?= $NumLang ?></option>         
            <?php while($v = $SelectLang->fetch()){ ?>
                    <option value="<?= $v['NumLang']?>" > <?= $v['NumLang']?> <?= $v['Lib2Lang']?> </option>
            <?php }?>               
        </select>

        

        <input type="submit" name="Submit" value="Validé">
    </form>
            <a href="vewThem.php">Retour</a>
        </div>

</body>
</html>