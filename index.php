<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gavé Bleu</title>
</head>
<body>
    <h1>Bienvenue sur Gavé Bleu</h1>
    <a href="ConnectionUser.php">Connexion</a>
    <a href="InscriptionUser.php">Inscription</a>
    <h2>Nos Articles</h2>

    <?php  
        include "conect.php";
              $Article = $bdPdo ->query('SELECT * FROM Article');
            
            ?>

                <?php while($v = $Article->fetch()){ ?>
                    <div>
                        <?php
                         $image = $v['UrlPhotA'];
                         ?>
                        <img src="<?=$v['UrlPhotA']?>"/>
                        <h3>Article num <?= $v['NumArt']?> : <?= $v['LibTitrA']?></h3>
                        <p><?= $v['LibChapoA']?></p>
                        <p><?= $v['DtCreA']?></p>
                        <p> <?= $v['Likes']?> likes</p>
                        <a href="article.php?id=<?= $v['NumArt']?>">Lire -></a>
                    </div>
                <?php }
                include "disconect.php";
                ?>

           <br />
                <?php 
                    if(isset($erreur)){ echo $erreur;}
                ?>

    <a href="mdp.php">Partie administration</a>

    <footer>
        <p class="copyright" style="text-align: center;">
            &copy; 2020 <span>Gavé Bleu</span>. All Rights Reserved.
            <br>
            <a href="https://icons8.com/icon/">Icons by Icons8</a>
		  </p>
    
    </footer>
    
</body>
</html>