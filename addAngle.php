<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Angles</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

    $SelectLang = $bdPdo ->query('SELECT * FROM Langue');
    $SelectLang2 = $bdPdo ->query('SELECT * FROM Langue');
    $SelectAngle = $bdPdo ->query('SELECT * FROM Angle');

            $NumLang ="";
            $NumAngl ="";
            $LibAngl ="";
           
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
              
				if (((isset($_POST['NumAngl'])) AND !empty($_POST['NumAngl']))
                AND ((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl']))
                AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))) {
                    $erreur = false;
                             



                    $NumAngl =$_POST['NumAngl'];
                    $LibAngl = ctrlSaisies($_POST['LibAngl']);
                    $NumLang = ctrlSaisies($_POST['NumLang']);
                      

                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO ANGLE (NumLang, NumAngl, LibAngl) VALUES (:NumLang, :NumAngl, :LibAngl)");
                            $stmt->bindParam(':NumLang', $NumLang);
                            $stmt->bindParam(':NumAngl', $NumAngl);
                            $stmt->bindParam(':LibAngl', $LibAngl);

                            $stmt->execute();
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }
                }
    
            
   
        
?>


    <h2>Ajoutez un Angle Nouveau</h2>
    <form action="addAngle.php" name="formAngle" method="post">

        <input  type="text" name="NumAngl" maxlength="25" id="" value="ANGL"  ><br>

        <label for="">Angle</label>
        <input type="text" name="LibAngl" maxlength="25" id="" ><br>

        <label for="">Quelle langue ?</label>
        <select name="NumLang" >            
            <?php while($v = $SelectLang->fetch()){ ?>
                    <option value="<?= $v['NumLang']?>" > <?= $v['NumLang']?> <?= $v['Lib2Lang']?> </option>
            <?php }?>               
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>


    <p>Ajoutez une Langue à un Angle <strong> Ca va pas fonctioner N'essayer pas j'attend le code de martine </strong></p>
    <form action="addAngle.php" name="formAngle" method="Get">
        
        <label for="">En quelle Angle ?</label>
            <select name="NumLang" >            
                <?php while($a = $SelectAngle->fetch()){ ?>
                        <option value="<?= $a['NumAngl']?>" > <?= $a['LibAngl']?> </option>
                <?php }?>               
            </select>
            <br>

        <label for="">Angle Sous une nouvelle Langue </label>
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


    <a href="index.php">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>