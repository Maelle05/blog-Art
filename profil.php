<?php 
session_start();

include 'conect.php';

if(isset($_GET['EMail'])){

    $EMail = htmlspecialchars($_GET['EMail']);
    $reqUser = $bdPdo->prepare("SELECT * FROM USER WHERE EMAIL = ?");
    $reqUser->execute(array($EMail));
    $userInfo = $reqUser->fetch();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Profil de <?= $userInfo['FirstName'] ?></h1>
    <p>Pseaudo = <?= $userInfo['Login'] ?></p>
    <?php
    if(isset($_SESSION['EMail']) AND $userInfo['EMail'] == $_SESSION['EMail']){
    ?>
    <a href="editUserProfil.php">Editer mon Profil</a>
    <a href="disconnectUser.php">Se déconnecter</a>

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






    <?php
    }
    ?>  
</body>
</html>

<?php }else{
    header("Location: index.php");
} ?>