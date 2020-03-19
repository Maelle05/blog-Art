<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Angles</title>
</head>
<body>

<?php

    ini_set('display_errors','on');

    include 'conect.php';

    function getNextNumAngl($NumLang) {

        include 'conect.php';
        $numSeq2Angl="0";
        // Découpage FK LANGUE
        $LibLangSelect = substr($NumLang, 0, 4);
        $parmNumLang = $LibLangSelect . '%';
        $requete = "SELECT MAX(NumLang) AS NumLang FROM ANGLE WHERE NumLang LIKE '$parmNumLang';";
        $result = $bdPdo->query($requete);

        if ($result) {
            $tuple = $result->fetch();
            $NumLang = $tuple["NumLang"];

            if (is_null($NumLang)) {    // New lang dans ANGLE
                $numSeq2Angl = 0;
            }
            // No séquence suivant LANGUE
            $numSeq2Angl++;
            // No séquence ANGLE
            $numSeq1Angl = 0;

            // No séquence ANGLE : Récup dernière PK utilisée
            $requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE;";

            $result = $bdPdo->query($requete);
            $tuple = $result->fetch();
            $NumAngl = $tuple["NumAngl"];

            $NumAnglSelect = (int)substr($NumAngl, 4, 2);
            $numSeq1Angl = $NumAnglSelect + 1;

            $LibAnglSelect = "ANGL";
            // PK reconstituée : ANGL + no seq angle
            if ($numSeq1Angl < 10) {
                $NumAngl = $LibAnglSelect . "0" . $numSeq1Angl;
            }
            else {
                $NumAngl = $LibAnglSelect . $numSeq1Angl;
            }
            // PK reconstituée : ANGL + no seq angle + no seq langue
            if ($numSeq2Angl < 10) {
                $NumAngl = $NumAngl . "0" . $numSeq2Angl;
            }
            else {
                $NumAngl = $NumAngl . $numSeq2Angl;
            }
        }   // End of if ($result) / no seq angle
        return $NumAngl;
      }

      function getNextNumAngl1($NumAngl) {

        include 'conect.php';

        $numAnglSelect = $NumAngl;
        $parmNumAngl = $numAnglSelect . '%';
        $requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE WHERE NumAngl LIKE '$parmNumAngl';";

        $result = $bdPdo->query($requete);

        $numSeqAngl = 0;
        if ($result){
            $tuple = $result->fetch();
            $NumAngl = $tuple["NumAngl"];
            if(is_null($NumAngl)){
                $NumAngl =0;
                $StrAngl =$numAnglSelect;

            }else{
                $NumAngl = $tuple["NumAngl"];
                $StrAngl = substr($NumAngl, 0,4);
                $numSeqAngl = (int)substr($NumAngl,4);
            }
            $numSeqAngl++;

            if ($numSeqAngl < 10){
                $NumAngl = $StrAngl . "0" . $numSeqAngl;
            }else{
                $NumAngl = $StrAngl . $numSeqAngl;
            }

        }

        return $NumAngl;
      }






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

                    $NumLang = ctrlSaisies($_POST['NumLang']);
                    $NumAngl = getNextNumAngl($NumLang);
                    $LibAngl = ctrlSaisies($_POST['LibAngl']);



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



                if (((isset($_GET['NumAngl'])) AND !empty($_GET['NumAngl']))
                AND ((isset($_GET['LibAngl'])) AND !empty($_GET['LibAngl']))
                AND ((isset($_GET['NumLang'])) AND !empty($_GET['NumLang']))) {
                    $erreur = false;

                    $NumLang = ctrlSaisies($_GET['NumLang']);
                    $NumAngl1 = ctrlSaisies($_GET['NumAngl']);
                    $NumAngl = getNextNumAngl1($NumAngl1);
                    $LibAngl = ctrlSaisies($_GET['LibAngl']);



                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO ANGLE (NumLang, NumAngl, LibAngl) VALUES (:NumLang, :NumAngl, :LibAngl)");
                            $stmt->bindParam(':NumLang', $NumLang);
                            $stmt->bindParam(':NumAngl', $NumAngl);
                            $stmt->bindParam(':LibAngl', $LibAngl);

                            $stmt->execute();
                        } catch (\Throwable $th) {
                            throw $th;
                        }
                    }





?>


    <h2>Ajouter un Angle nouveau</h2>
    <form action="addAngle.php" name="formAngle" method="post">

        <input  type="hidden" name="NumAngl" value="ANGL"  >

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


    <h2>Ajouter une Langue à un Angle existant </h2>
    <form action="addAngle.php" name="formAngle" method="get">

        <label for="">Pour quel Angle ?</label>
            <select name="NumAngl" >
                <?php while($a = $SelectAngle->fetch()){ ?>
                        <option value="<?= $a['NumAngl']?>" > <?= $a['NumLang']?> <?= $a['LibAngl']?> </option>
                <?php }?>
            </select>
            <br>

        <label for="">Angle sous une nouvelle Langue </label>
        <input type="text" name="LibAngl" maxlength="25" id="" ><br>

        <label for="">En quelle Langue ?</label>
        <select name="NumLang" >
            <?php while($l = $SelectLang2->fetch()){ ?>
                    <option value="<?= $l['NumLang']?>" > <?= $l['NumLang']?> <?= $l['Lib2Lang']?> </option>
            <?php }?>
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>


    <a href="admin.php?mot_de_passe=MMI21">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>
