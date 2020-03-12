<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Langue </title>
</head>
<body>
    <?php 
        
       include 'conect.php';

       $SelectPays = $bdPdo ->query('SELECT * FROM Pays');

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);

            $langue = $bdPdo->prepare('SELECT * FROM langue WHERE NumLang ="'.$get_id.'"');
            $langue->execute(
                array($get_id)
            );

            if($langue->rowCount() == 1){
                $langue =$langue->fetch();
                $NumLang = $langue['NumLang'];
                $Lib1Lang = $langue['Lib1Lang'];
                $Lib2Lang = $langue['Lib2Lang'];
                $NumPays = $langue['NumPays'];
            }else{
                die('Cette langue n\'existe pas !');
            }
        }else{
            die('Erreur');
        }

        if(isset($_GET['Submit']) ){
              
				if (((isset($_GET['Lib1Lang'])) AND !empty($_GET['Lib1Lang']))
                AND ((isset($_GET['Lib2Lang'])) AND !empty($_GET['Lib2Lang']))
                AND ((isset($_GET['NumPays'])) AND !empty($_GET['NumPays'])))
               {
                    
    

                    
                    $NumLang = 0;

				    $Lib1Lang = htmlspecialchars($_GET['Lib1Lang']);
                    $Lib2Lang = htmlspecialchars($_GET['Lib2Lang']);
                    $NumPays = htmlspecialchars($_GET['NumPays']);
                   

                    $numPaysSelect = $NumPays;
                    $parmNumlang = $numPaysSelect . '%';
                    $requete = "SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE NumLang LIKE '$parmNumlang';";

                    $result = $bdPdo->query($requete);

                    $numSeqLang = 0;
                    if ($result){
                        $tuple = $result->fetch();
                        $NumLang = $tuple["NumLang"];
                        if(is_null($NumLang)){
                            $NumLang =0;
                            $StrLang =$numPaysSelect;

                        }else{
                            $NumLang = $tuple["NumLang"];
                            $StrLang = substr($NumLang, 0,4);
                            $numSeqLang = (int)substr($NumLang,4);
                        }
                        $numSeqLang++;

                        if ($numSeqLang < 10){
                            $NumLang = $StrLang . "0" . $numSeqLang;
                        }else{
                            $NumLang = $StrLang . $numSeqLang;
                        }
                    }

                    try{
                        //Début transaction
                        $bdPdo->beginTransaction();
                        // preparation de la requete Preparee dans une chane de caractere
                        // instruction incert Preparation
                        $query = $bdPdo->prepare('UPDATE langue SET NumLang = :NumLang, Lib1Lang = :Lib1Lang, Lib2Lang = :Lib2Lang, NumPays = :NumPays WHERE  NumLang ="'.$get_id.'"');
                        // Execution du prepare lancement
                        $query->execute(
                            array(
                                ':NumLang'=> $NumLang,
                                ':Lib1Lang'=> $Lib1Lang,
                                ':Lib2Lang'=> $Lib2Lang,
                                ':NumPays'=> $NumPays
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
                    echo"Requete <b>update</b> a remplacé les valeurs de " . $NumLang . "!";
                    echo"<br />";
                    echo $NumLang;
                

                }
            }
        

                include 'disconect.php';
        
        ?>
    
            <h2>Modifier la Langue | <?= $NumLang?> </h2>
                <form action="editLang.php" name="formLangue" method="get">
                    <input type="hidden" name="id" value="<?= $NumLang ?>">

                    <label for="">Libellé cour :</label>
                    <input type="text" name="Lib1Lang" id="" maxlength="25" value="<?= $Lib1Lang ?>"><br>

                    <label for="">Libellé long :</label>
                    <input type="text" name="Lib2Lang" id="" maxlength="25"  value="<?= $Lib2Lang ?>"><br>

                    <label for="">Quel Pays :</label>
                    <select name="NumPays" >
                                <option value="<?= $NumPays ?>"><?= $NumPays ?></option>
                                <?php while($v = $SelectPays->fetch()){ ?>
                                        <option value="<?= $v['numPays']?>" > <?= $v['numPays']?> <?= $v['frPays']?> </option>
                                <?php }?>
                                
                    </select>

                        <br>


                    <input type="submit" name="Submit" value="Validé">
                </form>

            <a href="vewLang.php">Retour</a>
        </div>

</body>
</html>