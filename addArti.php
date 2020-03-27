<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
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

                    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0) {
                        // Test si fichier pas trop gros
                        if ($_FILES['monfichier']['size'] <= 2000000) {
                            // Test si extension autorisée
                            $infosfile = pathinfo($_FILES['monfichier']['name']);
                            $extension_upload = $infosfile['extension'];
                            $extensions_OK = array('jpg', 'jpeg', 'gif', 'png');
                            $name = $infosfile['filename'];
                            $file = 'imgArt' .$NumArt. '.' .$extension_upload;

                            if (in_array($extension_upload, $extensions_OK)) {
                                // valider fichier / le stocker définitivement
                                move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . $file);
                                echo "<p>Upload d'une image sur le serveur :</p>";
                                echo "<p><font color='green'>L'envoi de votre image a bien été effectué !</font><br /></p>";
                                echo'<a href="./uploads/'.$file.' "/>Voir l\'image</a>' . "<br>";
                            } else {
                                echo "<p>Upload d'une image sur le serveur :</p>";
                                echo "<font color='red'>L'extension du fichier n'est pas autorisée. <br /></font>";
                                echo "<font color='red'>(Seuls les fichiers jpg, jpeg, gif, png sont acceptés.)</font> " . "<br><br>";
                            }
                        } else {
                            echo "<p>Upload d'une image sur le serveur :</p>";
                            echo "<font color='red'>Le fichier est trop volumineux :</font> <br />";
                            echo "<font color='red'><b>(Poids limité à 4Mo) !</b></font>" . "<br><br>";
                        }
                    } else {
                        echo "<p>Upload d'une image sur le serveur :</p>";
                        echo "<p><font color='red'>Veuillez selectionner un fichier...</font></p>";
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
                            $stmt->bindParam(':UrlPhotA', $file);
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

<section class="nav-bar">
    <h1 class="admin-title">Gavé Bleu Administration</h1>
</section>

    <section class="admin-pannel-container">

        <h3>Ajouter un Nouvel Article</h3>
        <form class="admin-pannel-container"  action="addArti.php" name="formArti" method="post" enctype="multipart/form-data">

            <label for="">Titre de L'article</label>
            <input type="text" name="LibTitrA" placeholder="max 70 char." maxlength="70" id="" >

            <label for="">Chapô</label>
            <textarea type="text" name="LibChapoA" placeholder="max 500 char." maxlength="500" id=""></textarea>

            <label for="">Accroche</label>
            <textarea type="text" name="LibAccrochA" placeholder="max 500 char." maxlength="500" id="" ></textarea>

            <label for="">Paragraphe 1</label>
            <textarea type="text" name="Parag1A" placeholder="max 1200 char." maxlength="1200" id="" ></textarea>

            <label for="">Sous Titre 1</label>
            <textarea type="text" name="LibSsTitr1" placeholder="max 70 char." maxlength="70" id="" ></textarea>

            <label for="">Paragraphe 2</label>
            <textarea type="text" name="Parag2A" placeholder="max 1200 char." maxlength="1200" id="" ></textarea>

            <label for="">Sous Titre 2</label>
            <textarea type="text" name="LibSsTitr2" placeholder="max 70 char." maxlength="70" id="" ></textarea>

            <label for="">Paragraphe 3</label>
            <textarea type="text" name="Parag3A" placeholder="max 1200 char." maxlength="1200" id="" ></textarea>

            <label for="">Conclusion</label>
            <textarea type="text" name="LibConclA" placeholder="max 500 char." maxlength="500" id="" ></textarea>
    <?php //***********************************************************************************************************************?>

            <legend class="legend1">Ajouter mon image</legend>

                <input type="file" name="monfichier" id="monfichier" required="required" accept=".jpg,.gif,.png,.jpeg" size="62" maxlength="62" title="Recherchez le fichier à uploader !" autofocus="autofocus" />
              <p>
                <?php
                  // Gestion extension images acceptées
                  $msgImagesOK = ">> Extension des images acceptées : .jpg, .gif, .png, .jpeg (lageur, hauteur, taille max : 80000px, 80000px, 100 000 Go)";
                  echo "<i>" . $msgImagesOK . "</i>";
                ?>
              </p>
    <?php //***********************************************************************************************************************?>
            <label for="">L'angle de L'article</label>
            <select name="NumAngl" >
                <?php while($v = $SelectAngle->fetch()){ ?>
                        <option value="<?= $v['NumAngl']?>" ><?= $v['NumLang']?> <?= $v['LibAngl']?> </option>
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
