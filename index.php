<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gavé Bleu</title>
</head>
<body>
    <h1>Bienvenue sur Gavé Bleu</h1>
<p style="background-color: red">
    Nous sommes sur la partie ouverte au public, Pour accédé à la partie administration cliquer <a href="mdp.php">ICI</a><br>
    Le mdp est : MMI21 
</p>
    <h2>Nos Articles</h2>

    <?php  
        include "conect.php";
              $Article = $bdPdo ->query('SELECT * FROM Article');
            
            ?>

                <?php while($v = $Article->fetch()){ ?>
                    <div>
                        <h3>Article num <?= $v['NumArt']?> : <?= $v['LibTitrA']?></h3>
                        <p><?= $v['LibChapoA']?></p>
                        <p> <?= $v['Likes']?> likes</p>
                        <p>Commentaires :</p>
                        <?php 
                            $NumArt = $v['NumArt'];
                            $bdPdo->beginTransaction();

                            $query = $bdPdo->prepare('SELECT * FROM COMMENT WHERE NumArt=:NumArt;');
                        
                            $query->execute(
                              array(
                                ':NumArt' => $NumArt
                              )
                            );
                        
                            $bdPdo->commit();
                        ?>
                        <ul>
                            <?php while($v = $query->fetch()){ ?>
                                <li>"<?= $v['LibCom']?>" de <?= $v['PseudoAuteur']?> </li>               
                            <?php }?>
                        </ul>
                    </div>
                <?php }
                include "disconect.php";
                ?>

           <br />
                <?php 
                    if(isset($erreur)){ echo $erreur;}
                ?>

    <a href="mdp.php">Partie adminstration</a>
    
</body>
</html>