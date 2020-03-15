<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

    $SelectArt = $bdPdo ->query('SELECT * FROM article');

    function getNextNumCom() {

        // Connexion à la BDD 
        include 'conect.php';
  
        $requete = "SELECT MAX(NumCom) AS NumCom FROM COMMENT;";
        $result = $bdPdo->query($requete);
  
        if ($result) {
            $tuple = $result->fetch();
            $NumCom = $tuple["NumCom"];
            // No PK suivante COMMENT
            $NumCom++;
  
        }   // End of if ($result)
        return $NumCom;
      }
           
    // Fonction de controle des saisies du formulaire
    function ctrlSaisies($saisie) {

      // Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
      $saisie = trim($saisie);
      // Suppression des antislashs d'une chaîne
      $saisie = stripslashes($saisie);
      // Conversion des caractères spéciaux en entités HTML 
      $saisie = htmlentities($saisie);

      return $saisie;
    }




        if($_SERVER["REQUEST_METHOD"] == "POST"){			
              
				if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
                AND ((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
               ) {
                    $erreur = false;
                 				
                    $LibCom = ctrlSaisies($_POST['LibCom']);
                    $NumArt = ctrlSaisies($_POST['NumArt']);
                    $NumCom = getNextNumCom();
                    $PseudoAuteur = "Gavé Bleu Admin";
                    $EmailAuteur = "admin@gave-bleu.com";
                    $TitrCom = $LibCom;
                    $date = date("Y-m-d H:i:s");


                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, EmailAuteur, TitrCom, LibCom, NumArt) VALUES (:NumCom,:DtCreC,:PseudoAuteur,:EmailAuteur,:TitrCom,:LibCom, :NumArt)");
                            
                            
                            $stmt->bindParam(':NumCom', $NumCom);
                            $stmt->bindParam(':DtCreC', $date);
                            $stmt->bindParam(':PseudoAuteur', $PseudoAuteur);
                            $stmt->bindParam(':EmailAuteur', $EmailAuteur);
                            $stmt->bindParam(':TitrCom', $TitrCom);
                            $stmt->bindParam(':LibCom', $LibCom);
                            $stmt->bindParam(':NumArt', $NumArt);
     
                            $stmt->execute();

                            echo "Le Nouveau commentaire à bien ete ajouté à l'article numéro " .$NumArt . "!";
                        } catch (\Throwable $th) {
                            throw $th;
                        }
                    }                
            }
    
   
        
?>


    <h2>Ajoutez un Commentaire</h2>
    <form action="addCom.php" name="formCom" method="post">
        <label for="">Commentaire</label>
        <input type="text" name="LibCom" maxlength="25" id="" ><br>

        <label for="">Pour l'Article</label>
        <select name="NumArt" >            
                <?php while($a = $SelectArt->fetch()){ ?>
                        <option value="<?= $a['NumArt']?>" ><?= $a['NumArt']?> <?= $a['LibTitrA']?> </option>
                <?php }?>               
            </select>
        

        <input type="submit" name="Submit" value="Validé">
    </form>
    <a href="admin.php?mot_de_passe=MMI21">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>