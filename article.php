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
            <a class="menu-container-link" href="index.html">ACCUEIL</a>
            <a class="menu-container-link" href="articles.html">ARTICLES</a>
            <a class="menu-container-link" href="about.html">A PROPOS</a>
            <a class="menu-container-link" href="contact.html">CONTACT</a>
            <a class="menu-container-link" href="connexion.html">CONNECTION</a>
        </div>      
    </section>
    <section class="nav-bar">
        <a class="no-display" href="index.html"><img class="logo-header" src="img/logo.png"></a>
        <a href="articles.html">Articles</a>
        <a href="about.html">A propos</a>
        <a href="contact.html">Contact</a>
        <a href="connexion.html">Connection</a>
    
    </section>

    <section class="first-container">
        <h1>Slogan</h1>
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
                <a href=""><img src="img/like.png"></a>
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
                                </div> 
                            </div>              
                        <?php }?>
                    </div>
                </div>
            </section>
                <?php 
                     include "disconect.php";
                ?>
                <a href="index.php">Retour</a>

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
    <a href="#"><img class="logo-footer" src="img/logo.png"></a>
    <a href="#">MENTIONS LEGALES</a>
    <a href="#">COOKIES</a>
    <a href="#">CHARTE DE MODERATION</a>
 </footer>
   
</body>
</html>