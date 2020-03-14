<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mots</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

    $SelectLang = $bdPdo ->query('SELECT * FROM Langue');
    $SelectLang2 = $bdPdo ->query('SELECT * FROM Langue');
    $SelectMot = $bdPdo ->query('SELECT * FROM motcle');

            $NumLang ="";
            $NumMoCle ="";
            $LibMoCle ="";
           
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

            $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
              
				if (((isset($_POST['NumMoCle'])) AND !empty($_POST['NumMoCle']))
                AND ((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle']))
                AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))) {
                    $erreur = false;
                             



                    $NumMoCle =$_POST['NumMoCle'];
                    $LibMoCle = ctrlSaisies($_POST['LibMoCle']);
                    $NumLang = ctrlSaisies($_POST['NumLang']);
                      

                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO motcle (NumLang, NumMoCle, LibMoCle) VALUES (:NumLang, :NumMoCle, :LibMoCle)");
                            $stmt->bindParam(':NumLang', $NumLang);
                            $stmt->bindParam(':NumMoCle', $NumMoCle);
                            $stmt->bindParam(':LibMoCle', $LibMoCle);

                            $stmt->execute();
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }
                }
    
            
   
        
?>


    <h2>Ajoutez un Nouveau Mot Clé</h2>
    <form action="addMot.php" name="formMot" method="post">

        <input  type="hidden" name="NumMoCle" maxlength="25" id="" value="THEM"  ><br>

        <label for="">Mot Clé</label>
        <input type="text" name="LibThem" maxlength="25" id="" ><br>

        <label for="">En quelle langue ?</label>
        <select name="NumLang" >            
            <?php while($v = $SelectLang->fetch()){ ?>
                    <option value="<?= $v['NumLang']?>" > <?= $v['NumLang']?> <?= $v['Lib2Lang']?> </option>
            <?php }?>               
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>


    <p>Ajoutez une Langue à un mot clé <strong> Ca va pas fonctioner N'essayer pas j'attend le code de martine </strong></p>
    <form action="addThem.php" name="formThem" method="Get">
        
        <label for="">Pour Quel Mot clé ?</label>
            <select name="NumMoCle" >            
                <?php while($a = $SelectMot->fetch()){ ?>
                        <option value="<?= $a['NumMoCle']?>" > <?= $a['LibMoCle']?> </option>
                <?php }?>               
            </select>
            <br>

        <label for="">Mot Clé Sous la nouvelle Langue </label>
        <input type="text" name="LibAngl" maxlength="25" id="" ><br>

        <label for="">En quelle langue ?</label>
        <select name="NumLang" >            
            <?php while($l = $SelectLang2->fetch()){ ?>
                    <option value="<?= $l['NumLang']?>" > <?= $l['NumLang']?> <?= $l['Lib2Lang']?> </option>
            <?php }?>               
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>


    <a href="admin.php">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>