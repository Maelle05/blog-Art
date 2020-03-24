<?php 
// session_start();

// include 'conect.php';

// if(isset($_GET['EMail'])){

//     $EMail = htmlspecialchars($_GET['EMail']);
//     $reqUser = $bdPdo->prepare("SELECT * FROM USER WHERE EMAIL = ?");
//     $reqUser->execute(array($EMail));
//     $userInfo = $reqUser->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Article</title>
</head>
<body class="article-page">
    
    <div class="icon">
        <div class="hamburger hamburger-middle"></div>
    </div>

    <section class="menu-container">
        <div class="link-container-menu">
            <a class="menu-container-link" href="index.php">ACCUEIL</a>
            <a class="menu-container-link" href="index.php">ARTICLES</a>
            <a class="menu-container-link" href="about.php">A PROPOS</a>
            <a class="menu-container-link" href="contact.php">CONTACT</a>
            <a class="menu-container-link" href="ConnectionUser.php">Connexion</a>
        </div>      
    </section>

    <section class="nav-bar">
        <a class="no-display" href="index.php"><img class="logo-header" src="img/logo.png"></a>
        <a href="index.php">Articles</a>
        <a href="about.php">A propos</a>
        <a href="contact.php">Contact</a>
        <a href="ConnectionUser.php">Connexion</a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>
    
    <?php  
        include "conect.php";
        $numArticle =htmlspecialchars($_GET['id']);
        $Article = $bdPdo ->prepare('SELECT * FROM Article WHERE NumArt =?');
       
        $Article->execute(array($numArticle));
        if($Article->rowCount() == 1){
            $Article =$Article->fetch();
            $NumArt = $Article['NumArt'];
            $DtCreA = $Article['DtCreA'];
            $LibTitrA = $Article['LibTitrA'];
            $LibAccrochA = $Article['LibAccrochA'];
            $Parag1A = $Article['Parag1A'];
            $LibSsTitr1 = $Article['LibSsTitr1'];
            $Parag2A = $Article['Parag2A'];
            $LibSsTitr2 = $Article['LibSsTitr2'];
            $Parag3A = $Article['Parag3A'];
            $LibConclA = $Article['LibConclA'];
            $UrlPhotA = $Article['UrlPhotA'];
            $Likes = $Article['Likes'];
            $NumAngl = $Article['NumAngl'];
            $NumThem = $Article['NumThem'];
        }else{
            die('C\'ette Article n\'existe pas !');
        }

    ?>
        <section class="article-container">
            <h3><?= $LibTitrA ?> </h3>
                   
            <p class="publie"><?= $DtCreA ?></p>
            <p class="chapo"><?= $LibAccrochA ?></p>
            <p class="first-paragraphe"><?= $Parag1A ?></p>
            <img class="illustration" src="<?= $UrlPhotA ?>" alt="">
            <p class="sous-titre"><?= $LibSsTitr1 ?></p>
            <p class="second-paragraphe"><?= $Parag2A ?></p>
            <img class="illustration" src="<?= $UrlPhotA ?>" alt="">
            <p class="sous-titre"><?= $LibSsTitr2 ?></p>
            <p class="third-paragraphe"><?= $Parag3A ?></p>
            <p class="conclusion"><?= $LibConclA ?></p>

            <div class="articles-logo-container">
                <a style="display: flex; flex-direction: column; align-items: center;" href="connectionUser.php"><img src="img/like.png"><?= $Likes ?> </a>
                <a href=""><img src="img/share.png"></a>
            </div>
            <p>Mots-Clés</p>
        </section>

            <section class="commentaires-container">
                <div class="commentaire-wrapper">

                    <h3 class="commentaire-title">Commentaires</h3>
                    <?php 
                        $bdPdo->beginTransaction();

                        $query = $bdPdo->prepare('SELECT * FROM COMMENT WHERE NumArt=:NumArt;');
                    
                        $query->execute(
                          array(
                            ':NumArt' => $NumArt
                          )
                        );
                    
                        $bdPdo->commit();
                    ?>
                    <div class="commentary">
                        <?php while($v = $query->fetch()){ ?>
                            <div>
                                <img class="user-logo" src="img/user.png">
                                <div class="commentary-content">
                                    <p>"<?= $v['LibCom']?>" de <?= $v['PseudoAuteur']?> </p>
                                    <p><?= $v['DtCreC'] ?></p>
                                </div> 
                            </div>              
                        <?php }?>
                    </div>
                </div>
            </section>
                <?php 
                     include "disconect.php";
                ?>

           <br />
                <?php 
                    if(isset($erreur)){ echo $erreur;}
                ?>
 <?php 
    // }else{
    // header("Location: index.php");
    // }
 ?> 
 <footer>
    <div class="footer-link-admin">
        <a href="mdp.php"><img class="logo-footer" src="img/logo.png"></a>
        <a class="admin-link" href="mdp.php">Partie administration</a>
    </div>
    <a href="#">MENTIONS LEGALES</a>
    <a href="#">COOKIES</a>
    <a href="#">CHARTE DE MODERATION</a>
 </footer>
   
</body>
</html>