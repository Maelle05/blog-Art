<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Ajouter Langue</title>
</head>
<body>

<?php

    ini_set('display_errors','on');

    include 'conect.php';

    $SelectPays = $bdPdo ->query('SELECT * FROM Pays');

            $NumLang ="";
            $Lib1Lang ="";
            $Lib2Lang ="";
            $numPays ="";
            $NumPays ="";

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
			if (isset($_POST['id']) AND $_POST['id'] == 0) {

				if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
                AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
                AND ((isset($_POST['NumPays'])) AND !empty($_POST['NumPays']))) {
                    $erreur = false;

                    $NumLang = 0;

                    $Lib1Lang = ctrlSaisies($_POST['Lib1Lang']);
                    $Lib2Lang = ctrlSaisies($_POST['Lib2Lang']);
                    $NumPays = ctrlSaisies($_POST['NumPays']);

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



                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, NumPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :NumPays)");
                            $stmt->bindParam(':NumLang', $NumLang);
                            $stmt->bindParam(':Lib1Lang', $Lib1Lang);
                            $stmt->bindParam(':Lib2Lang', $Lib2Lang);
                            $stmt->bindParam(':NumPays', $NumPays);

                            $stmt->execute();
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }


            }
    }
}


?>


<section class="nav-bar">
    <h1 class="admin-title">Gavé Bleu Administration</h1>
</section>

<section class="admin-pannel-container">

        <h3>Ajouter une langue...</h3>
        <form class="admin-pannel-container" action="addLang.php" name="formLangue" method="post">
            <input type="hidden" name="id" value="">

            <label for="">Libellé court :</label>
            <input type="text" name="Lib1Lang" maxlength="25" id="" placeholder="max 25 char."><br>

            <label for="">Libellé long :</label>
            <input type="text" name="Lib2Lang" maxlength="45" id="" placeholder="max 45 char."><br>

            <label for="">Quel Pays :</label>
            <select name="NumPays" >
                <?php while($v = $SelectPays->fetch()){ ?>
                        <option value="<?= $v['numPays']?>" > <?= $v['numPays']?> <?= $v['frPays']?> </option>
                <?php }?>
            </select>

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
