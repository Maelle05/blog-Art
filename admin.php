<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Gavé Bleu Admin</title>
</head>

            <?php
        if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "MMI21" OR $_GET['mot_de_passe'] == "MMI21") // Si le mot de passe est bon
        {
        // On affiche les codes
        ?>


<?php
    include "conect.php";
     $Articles = $bdPdo ->query('SELECT * FROM Article');
 ?>
<body>
    <section class="nav-bar">
        <h1 class="admin-title">Gavé Bleu Administration</h1>
    </section>
    <section class="admin-pannel-container">
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Images</h3>
            <a href="upload.php">Ajouter une image</a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Articles</h3>
            <a href="addArti.php">Ecrire un nouvel Article</a> 
            <a href="vewArti.php">Voir tout les Articles </a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Langues</h3>
            <a href="addLang.php">Nouvelle Langue</a>
            <a href="vewLang.php">Voir toutes les Langues</a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Utilisateurs</h3>
            <a href="addUser.php">  Ajouter un nouvel Utilisateur</a> 
            <a href="vewUser.php">Voir tout les Utilisateurs</a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Angles</h3>
            <a href="addAngle.php">Ajouter un nouvel Angle</a> 
            <a href="vewAngle.php">Voir tout les Angles</a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Thématiques</h3>
            <a href="addThem.php">Ajouter une nouvelle Thématique</a> 
            <a href="vewThem.php">Voir toutes les Thématiques</a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Les Mots clés</h3>
            <a href="addMot.php"> Ajouter un nouveau mot clé</a> 
            <a href="vewMot.php">Voir tout les mots clés</a> 
            <a href="motArt.php">Lier les mots aux articles</a> 
            <hr class="horizontal-bar-admin">
        </div>
        <div class="admin-part-container">
            <h3 class="admin-h3">Voir les Commentaires par Article</h3>
            <a href="addCom.php">Ajouter un nouveau commentaire</a>
            <ul class="articles-list">
            <?php while($v = $Articles->fetch()){ ?>
                    <li><a href="vewCom.php? id=<?=$v['NumArt']?> "> Pour l'Article "<?= $v['LibTitrA']?>" </a></li>
            <?php }?>
            </ul>
        </div>
    <h4><a href="index.php">Voir la partie pour les visiteurs du site </a></h4>
    </section>

    <footer>
        <p class="copyright" style="text-align: center;">
            &copy; 2020 <span>Gavé Bleu</span>. All Rights Reserved.
            <br>
            <a href="https://icons8.com/icon/">Icons by Icons8</a>
		  </p>

    </footer>
</body>

        <?php
        }
        else // Sinon, on affiche un message d'erreur
        {
            echo '<p>Mot de passe incorrect</p> <a href="mdp.php"> Retour</a>';
        }
        ?>
</html>
