<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Ajouter Mots</title>
</head>
<body>

<?php

    ini_set('display_errors','on');

    include 'conect.php';

    function getNextNumMoCle($NumLang) {

        // Connexion à la BDD
        include 'conect.php';

       // Découpage FK LANGUE
       $LibLangSelect = substr($NumLang, 0, 4);
       $parmNumLang = $LibLangSelect . '%';

       $requete = "SELECT MAX(NumLang) AS NumLang FROM motcle WHERE NumLang LIKE '$parmNumLang';";
       $result = $bdPdo->query($requete);

       if ($result) {
           $tuple = $result->fetch();
           $NumLang = $tuple["NumLang"];
           if (is_null($NumLang)) {    // New lang dans MOTCLE
               // Récup dernière PK utilisée
               $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE;";
               $result = $bdPdo->query($requete);
               $tuple = $result->fetch();
               $NumMoCle = $tuple["NumMoCle"];

               $NumMoCleSelect = (int)substr($NumMoCle, 4, 2);
               // No séquence suivant LANGUE
               $numSeq1MoCle = $NumMoCleSelect + 1;
               // Init no séquence MOTCLE pour nouvelle lang
               $numSeq2MoCle = 1;
           }
           else {
               // Récup dernière PK pour FK sélectionnée
               $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM motcle WHERE NumLang LIKE '$parmNumLang' ;";
               $result = $bdPdo->query($requete);
               $tuple = $result->fetch();
               $NumMoCle = $tuple["NumMoCle"];

               // No séquence actuel LANGUE
               $numSeq1MoCle = (int)substr($NumMoCle, 4, 2);
               // No séquence actuel MOTCLE
               $numSeq2MoCle = (int)substr($NumMoCle, 6, 2);
               // No séquence suivant MOTCLE
               $numSeq2MoCle++;
           }

           $LibMoCleSelect = "MTCL";
           // PK reconstituée : MTCL + no seq langue
           if ($numSeq1MoCle < 10) {
               $NumMoCle = $LibMoCleSelect . "0" . $numSeq1MoCle;
           }
           else {
               $NumMoCle = $LibMoCleSelect . $numSeq1MoCle;
           }
           // PK reconstituée : MOCL + no seq langue + no seq mot clé
           if ($numSeq2MoCle < 10) {
               $NumMoCle = $NumMoCle . "0" . $numSeq2MoCle;
           }
           else {
               $NumMoCle = $NumMoCle . $numSeq2MoCle;
           }
       }   // End of if ($result) / no seq LANGUE
       return $NumMoCle;
     }


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



                    $NumLang = ctrlSaisies($_POST['NumLang']);
                    $NumMoCle =getNextNumMoCle($NumLang);
                    $LibMoCle = ctrlSaisies($_POST['LibMoCle']);



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
                }   ?>



<section class="nav-bar">
    <h1 class="admin-title">Gavé Bleu Administration</h1>
</section>



<section class="admin-pannel-container">
    <h3>Ajouter un Nouveau Mot Clé</h3>
    <form class="admin-pannel-container" action="addMot.php" name="formMot" method="post">

        <input  type="hidden" name="NumMoCle" placeholder="max 25 char." maxlength="25" id="" value="MTCL"  >

        <label for="">Mot Clé</label>
        <input type="text" name="LibMoCle" placeholder="max 25 char." maxlength="25" id="" ><br>

        <label for="">En quelle langue ?</label>
        <select name="NumLang" >
            <?php while($v = $SelectLang->fetch()){ ?>
                    <option value="<?= $v['NumLang']?>" ><?= $v['Lib2Lang']?> </option>
            <?php }?>
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>


    <a href="admin.php?mot_de_passe=MMI21">Retour</a>
  </section>

<footer>
    <p class="copyright" style="text-align: center;">
        &copy; 2020 <span>Gavé Bleu</span>. All Rights Reserved.
        <br>
        <a href="https://icons8.com/icon/">Icons by Icons8</a>
      </p>

</footer>


<?php include 'disconect.php';?>


</body>
</html>
