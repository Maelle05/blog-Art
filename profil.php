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
    <p>Pseudo = <?= $userInfo['Login'] ?></p>
    <?php
    if(isset($_SESSION['EMail']) AND $userInfo['EMail'] == $_SESSION['EMail']){
    ?>
    <a href="editUserProfil.php">Editer mon Profil</a>
    <a href="disconnectUser.php">Se déconnecter</a>

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
                        <img src="<?= $v['UrlPhotA'] ?>"/>
                        <h3>Article num <?= $v['NumArt']?> : <?= $v['LibTitrA']?></h3>
                        <p><?= $v['LibChapoA']?></p>
                        <p><?= $v['DtCreA']?></p>
                        <p> <?= $v['Likes']?> likes</p>
                        <a href="articleC.php?id=<?= $v['NumArt']?>&amp;EMail=<?= $_SESSION['EMail']?>&amp;l=0">Lire -></a>
                    </div>
                <?php }
                include "disconect.php";
                ?>

           <br />
                <?php
                    if(isset($erreur)){ echo $erreur;}
                ?>

    <a href="mdp.php">Partie adminstration</a>

    <?php
    }
    ?>
</body>
</html>

<?php }else{
    header("Location: index.php");
} ?>
