<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

    $SelectAngle = $bdPdo ->query('SELECT * FROM angle');
    $SelectTheme = $bdPdo ->query('SELECT * FROM thematique');
    $SelectLang = $bdPdo ->query('SELECT * FROM Langue');

     
           
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
              
			if ( ((isset($_POST['LibTitrA'])) AND !empty($_POST['LibTitrA']))
                AND ((isset($_POST['LibChapoA'])) AND !empty($_POST['LibChapoA']))
                AND ((isset($_POST['LibAccrochA'])) AND !empty($_POST['LibAccrochA']))
                AND ((isset($_POST['Parag1A'])) AND !empty($_POST['Parag1A']))
                AND ((isset($_POST['LibSsTitr1'])) AND !empty($_POST['LibSsTitr1']))
                AND ((isset($_POST['Parag2A'])) AND !empty($_POST['Parag2A']))
                AND ((isset($_POST['LibSsTitr2'])) AND !empty($_POST['LibSsTitr2']))
                AND ((isset($_POST['Parag3A'])) AND !empty($_POST['Parag3A']))
                AND ((isset($_POST['LibConclA'])) AND !empty($_POST['LibConclA']))
                AND ((isset($_POST['UrlPhotA'])) AND !empty($_POST['UrlPhotA']))
                AND ((isset($_POST['NumAngl'])) AND !empty($_POST['NumAngl']))
                AND ((isset($_POST['NumThem'])) AND !empty($_POST['NumThem']))
                AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
                ) {
                    $erreur = false;
                    
                    $LibTitrA = ctrlSaisies($_POST['LibTitrA']);
                    $LibChapoA = ctrlSaisies($_POST['LibChapoA']);
                    $LibAccrochA = ctrlSaisies($_POST['LibAccrochA']);
                    $Parag1A = ctrlSaisies($_POST['Parag1A']);
                    $LibSsTitr1 = ctrlSaisies($_POST['LibSsTitr1']);
                    $Parag2A = ctrlSaisies($_POST['Parag2A']);
                    $LibSsTitr2 = ctrlSaisies($_POST['LibSsTitr2']);
                    $Parag3A = ctrlSaisies($_POST['Parag3A']);
                    $LibConclA = ctrlSaisies($_POST['LibConclA']);
                    $UrlPhotA = ctrlSaisies($_POST['UrlPhotA']);
                    $Likes = 0;
                    $NumAngl = ctrlSaisies($_POST['NumAngl']);
                    $NumThem = ctrlSaisies($_POST['NumThem']);
                    $NumLang = ctrlSaisies($_POST['NumLang']);

                

//.........................................................................................................
                    
                    $requete = "SELECT MAX(NumArt) AS NumArt FROM article";

                    $result = $bdPdo->query($requete);
                    $row = $result->fetch();
                    $NumArt = $row["NumArt"] + 1;

                    if($NumArt < 10) {
                        $NumArt = "0" . $NumArt;
                    }
//.........................................................................................................
                    $date = date("Y-m-d");


                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO `article`(`NumArt`, `DtCreA`, `LibTitrA`, `LibChapoA`, `LibAccrochA`, `Parag1A`, `LibSsTitr1`, `Parag2A`, `LibSsTitr2`, `Parag3A`, `LibConclA`, `UrlPhotA`, `Likes`, `NumAngl`, `NumThem`, `NumLang`) VALUES (:NumArt,:DtCreA,:LibTitrA,:LibChapoA,:LibAccrochA,:Parag1A,:LibSsTitr1,:Parag2A,:LibSsTitr2,:Parag3A,:LibConclA,:UrlPhotA,:Likes,:NumAngl,:NumThem,:NumLang)");

  
                            $stmt->bindParam(':NumArt', $NumArt);
                            $stmt->bindParam(':DtCreA', $date);
                            $stmt->bindParam(':LibTitrA', $LibTitrA);
                            $stmt->bindParam(':LibChapoA', $LibChapoA);
                            $stmt->bindParam(':LibAccrochA', $LibAccrochA);
                            $stmt->bindParam(':Parag1A', $Parag1A);
                            $stmt->bindParam(':LibSsTitr1', $LibSsTitr1);
                            $stmt->bindParam(':Parag2A', $Parag2A);
                            $stmt->bindParam(':LibSsTitr2', $LibSsTitr2);
                            $stmt->bindParam(':Parag3A', $Parag3A);
                            $stmt->bindParam(':LibConclA', $LibConclA);
                            $stmt->bindParam(':UrlPhotA', $UrlPhotA);
                            $stmt->bindParam(':Likes', $Likes);
                            $stmt->bindParam(':NumAngl', $NumAngl);
                            $stmt->bindParam(':NumThem', $NumThem);
                            $stmt->bindParam(':NumLang', $NumLang);
        
                            $stmt->execute();

                            
                        } catch (\Throwable $th) {
                            throw $th;
                        }
                    }

                
            }


   
        
?>


    <h2>Ajoutez un Nouvel Article</h2>
    <form action="addArti.php" name="formArti" method="post">

        <label for="">Titre de L'article</label>
        <input type="text" name="LibTitrA"  id="" ><br>

        <label for="">Chapô</label>
        <input type="text" name="LibChapoA"  id="" ><br>

        <label for="">Accroche</label>
        <input type="text" name="LibAccrochA"  id="" ><br>

        <label for="">Paragraphe 1</label>
        <input type="text" name="Parag1A"  id="" ><br>

        <label for="">Sous Titre 1</label>
        <input type="text" name="LibSsTitr1"  id="" ><br>

        <label for="">Paragraphe 2</label>
        <input type="text" name="Parag2A"  id="" ><br>

        <label for="">Sous Titre 2</label>
        <input type="text" name="LibSsTitr2"  id="" ><br>

        <label for="">Paragraphe 3</label>
        <input type="text" name="Parag3A"  id="" ><br>

        <label for="">Conclusion</label>
        <input type="text" name="LibConclA"  id="" ><br>

        <label for="">Image URL</label>
        <input type="text" name="UrlPhotA"  id="" ><br>

        <label for="">L'angle de L'article</label>
        <select name="NumAngl" >            
            <?php while($v = $SelectAngle->fetch()){ ?>
                    <option value="<?= $v['NumAngl']?>" > <?= $v['LibAngl']?> </option>
            <?php }?>               
        </select><br>

        <label for="">Thématique de L'article</label>
        <select name="NumThem" >            
            <?php while($t = $SelectTheme->fetch()){ ?>
                    <option value="<?= $t['NumThem']?>" > <?= $t['LibThem']?> </option>
            <?php }?>               
        </select><br>

        <label for="">Langue de L'article</label>
        <select name="NumLang" >            
            <?php while($l = $SelectLang->fetch()){ ?>
                    <option value="<?= $l['NumLang']?>" > <?= $l['Lib1Lang']?> </option>
            <?php }?>               
        </select><br>

        <input type="submit" name="Submit" value="Validé">
    </form>
    <a href="index.php">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>