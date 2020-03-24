<?php
/*
*   Script : upload.php
*/
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0) {
        // Test si fichier pas trop gros
        if ($_FILES['monfichier']['size'] <= 2000000) {
            // Test si extension autorisée
            $infosfile = pathinfo($_FILES['monfichier']['name']);
            $extension_upload = $infosfile['extension'];
            $extensions_OK = array('jpg', 'jpeg', 'gif', 'png');
            $name = $infosfile['filename'];
            $file = '' .$name. '.' .$extension_upload;
            
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

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <!-- Debut du formulaire -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <legend class="legend1">Ajouter mon image</legend>
          <p>
            <label for="uploadFile" title="Recherchez le fichier à uploader !"><b>Quel fichier ?&nbsp;&nbsp;&nbsp;</b></label>
            <input type="file" name="monfichier" id="monfichier" required="required" accept=".jpg,.gif,.png,.jpeg" size="62" maxlength="62" title="Recherchez le fichier à uploader !" autofocus="autofocus" />
            <br><br>
            <input type="submit" name="submit" value="Uploader"  />
          </p>
          <p>
            <?php
              // Gestion extension images acceptées
              $msgImagesOK = ">> Extension des images acceptées : .jpg, .gif, .png, .jpeg (lageur, hauteur, taille max : 80000px, 80000px, 100 000 Go)";
              echo "<i>" . $msgImagesOK . "</i>";
            ?>
          </p>
    </form>
    <a href="admin.php?mot_de_passe=MMI21">Retour</a>
    <!-- Fin du formulaire -->
  </body>
</html>
