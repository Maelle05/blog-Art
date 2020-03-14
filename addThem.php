<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Thematiques</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

    $SelectLang = $bdPdo ->query('SELECT * FROM Langue');
    $SelectLang2 = $bdPdo ->query('SELECT * FROM Langue');
    $SelectThem = $bdPdo ->query('SELECT * FROM thematique');

            $NumLang ="";
            $NumThem ="";
            $LibThem ="";
           
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
              
				if (((isset($_POST['NumThem'])) AND !empty($_POST['NumThem']))
                AND ((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
                AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))) {
                    $erreur = false;
                             



                    $NumThem =$_POST['NumThem'];
                    $LibThem = ctrlSaisies($_POST['LibThem']);
                    $NumLang = ctrlSaisies($_POST['NumLang']);
                      

                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO thematique (NumLang, NumThem, LibThem) VALUES (:NumLang, :NumThem, :LibThem)");
                            $stmt->bindParam(':NumLang', $NumLang);
                            $stmt->bindParam(':NumThem', $NumThem);
                            $stmt->bindParam(':LibThem', $LibThem);

                            $stmt->execute();
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }
                }
    
            
   
        
?>


    <h2>Ajoutez une Nouvelle Thématique</h2>
    <form action="addThem.php" name="formThem" method="post">

        <input  type="hidden" name="NumThem" maxlength="25" id="" value="THEM"  ><br>

        <label for="">Thématique</label>
        <input type="text" name="LibThem" maxlength="25" id="" ><br>

        <label for="">Quelle langue ?</label>
        <select name="NumLang" >            
            <?php while($v = $SelectLang->fetch()){ ?>
                    <option value="<?= $v['NumLang']?>" > <?= $v['NumLang']?> <?= $v['Lib2Lang']?> </option>
            <?php }?>               
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>


    <p>Ajoutez une Langue à une Thématique <strong> Ca va pas fonctioner N'essayer pas j'attend le code de martine </strong></p>
    <form action="addThem.php" name="formThem" method="Get">
        
        <label for="">En quelle Thématique ?</label>
            <select name="NumThem" >            
                <?php while($a = $SelectThem->fetch()){ ?>
                        <option value="<?= $a['NumThem']?>" > <?= $a['LibThem']?> </option>
                <?php }?>               
            </select>
            <br>

        <label for="">Thématique Sous une nouvelle Langue </label>
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