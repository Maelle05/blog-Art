<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Ajouter Thematiques</title>
</head>
<body>

<?php

    ini_set('display_errors','on');

    include 'conect.php';

    function getNextNumThem($NumLang) {

        // Connexion à la BDD
        include 'conect.php';

        // Découpage FK LANGUE
        $LibLangSelect = substr($NumLang, 0, 4);
        $parmNumLang = $LibLangSelect . '%';

        $requete = "SELECT MAX(NumLang) AS NumLang FROM THEMATIQUE WHERE NumLang LIKE '$parmNumLang';";
        $result = $bdPdo->query($requete);

        if ($result) {
            $tuple = $result->fetch();
            $NumLang = $tuple["NumLang"];
            if (is_null($NumLang)) {    // New lang dans THEMATIQUE
                // Récup dernière PK utilisée
                $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE;";
                $result = $bdPdo->query($requete);
                $tuple = $result->fetch();
                $NumThem = $tuple["NumThem"];

                $NumThemSelect = (int)substr($NumThem, 3, 2);
                // No séquence suivant LANGUE
                $numSeq1Them = $NumThemSelect + 1;
                // Init no séquence THEMATIQUE pour nouvelle lang
                $numSeq2Them = 1;
            }
            else {
                // Récup dernière PK pour FK sélectionnée
                $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE WHERE NumLang LIKE '$parmNumLang' ;";
                $result = $bdPdo->query($requete);
                $tuple = $result->fetch();
                $NumThem = $tuple["NumThem"];

                // No séquence actuel LANGUE
                $numSeq1Them = (int)substr($NumThem, 3, 2);
                // No séquence actuel THEMATIQUE
                $numSeq2Them = (int)substr($NumThem, 5, 2);
                // No séquence suivant THEMATIQUE
                $numSeq2Them++;
            }

            $LibThemSelect = "THE";
            // PK reconstituée : THE + no seq langue
            if ($numSeq1Them < 10) {
                $NumThem = $LibThemSelect . "0" . $numSeq1Them;
            }
            else {
                $NumThem = $LibThemSelect . $numSeq1Them;
            }
            // PK reconstituée : THE + no seq langue + no seq thématique
            if ($numSeq2Them < 10) {
                $NumThem = $NumThem . "0" . $numSeq2Them;
            }
            else {
                $NumThem = $NumThem . $numSeq2Them;
            }
        }   // End of if ($result) / no seq LANGUE
        return $NumThem;
      }

      function getNextNumThem1($NumThem) {

        include 'conect.php';

        $numThemSelect = $NumThem;
        $parmNumThem = $numThemSelect . '%';
        $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE WHERE NumThem LIKE '$parmNumThem';";

        $result = $bdPdo->query($requete);

        $numSeqThem = 0;
        if ($result){
            $tuple = $result->fetch();
            $NumThem = $tuple["NumThem"];
            if(is_null($NumThem)){
                $NumThem =0;
                $StrThem =$numThemSelect;

            }else{
                $NumThem = $tuple["NumThem"];
                $StrThem = substr($NumThem, 0,4);
                $numSeqThem = (int)substr($NumThem,4);
            }
            $numSeqThem++;

            if ($numSeqThem < 10){
                $NumThem = $StrThem . "0" . $numSeqThem;
            }else{
                $NumThem = $StrThem . $numSeqThem;
            }

        }

        return $NumThem;
      }




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


                    $NumLang = ctrlSaisies($_POST['NumLang']);
                    $NumThem =getNextNumThem($NumLang);
                    $LibThem = ctrlSaisies($_POST['LibThem']);



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

                if($_SERVER["REQUEST_METHOD"] == "GET"){

                    $Submit = isset($_GET['Submit']) ? $_GET['Submit'] : '';

                        if (((isset($_GET['NumThem'])) AND !empty($_GET['NumThem']))
                        AND ((isset($_GET['LibThem'])) AND !empty($_GET['LibThem']))
                        AND ((isset($_GET['NumLang'])) AND !empty($_GET['NumLang']))) {
                            $erreur = false;




                            $NumThem1 =$_GET['NumThem'];
                            $NumThem = getNextNumThem1($NumThem1);
                            echo $NumThem;
                            $LibThem = ctrlSaisies($_GET['LibThem']);
                            $NumLang = ctrlSaisies($_GET['NumLang']);


                                try {
                                    $stmt = $bdPdo->prepare("INSERT INTO thematique (NumLang, NumThem, LibThem) VALUES (:NumLang, :NumThem, :LibThem)");
                                    $stmt->bindParam(':NumLang', $NumLang);
                                    $stmt->bindParam(':NumThem', $NumThem);
                                    $stmt->bindParam(':LibThem', $LibThem);

                                    $stmt->execute();
                                } catch (\Throwable $th) {
                                    throw $th;
                                }
                            }
                        }




?>


<section class="nav-bar">
    <h1 class="admin-title">Gavé Bleu Administration</h1>
</section>



<section class="admin-pannel-container">


    <h3>Ajouter une Nouvelle Thématique</h3>
    <form class="admin-pannel-container" action="addThem.php" name="formThem" method="post">

        <input  type="hidden" name="NumThem" placeholder="max 25 char." maxlength="25" id="" value="THEM"  >

        <label for="">Thématique</label>
        <input type="text" name="LibThem" placeholder="max 60 char." maxlength="60" id="" ><br>

        <label for="">Quelle langue ?</label>
        <select name="NumLang" >
            <?php while($v = $SelectLang->fetch()){ ?>
                    <option value="<?= $v['NumLang']?>" > <?= $v['NumLang']?> <?= $v['Lib2Lang']?> </option>
            <?php }?>
        </select>
                <br>
        <input type="submit" name="Submit" value="Valider">
    </form>


    <h3>Ajouter une nouvelle Langue à une Thématique</h3>
    <form class="admin-pannel-container" action="addThem.php" name="formThem" method="get">

        <label for="">Pour quelle Thématique ?</label>
            <select name="NumThem" >
                <?php while($a = $SelectThem->fetch()){ ?>
                        <option value="<?= $a['NumThem']?>" ><?= $a['NumLang']?><?= $a['LibThem']?> </option>
                <?php }?>
            </select>
            <br>

        <label for="">Thématique sous une nouvelle Langue </label>
        <input type="text" name="LibThem" placeholder="max 60 char." maxlength="60" id="" ><br>

        <label for="">En quelle langue ?</label>
        <select name="NumLang" >
            <?php while($l = $SelectLang2->fetch()){ ?>
                    <option value="<?= $l['NumLang']?>" > <?= $l['NumLang']?> <?= $l['Lib2Lang']?> </option>
            <?php }?>
        </select>
                <br>
        <input type="submit" name="Submit" value="Valider">
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
