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
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Profil</title>
</head>
<body class="index-page">
    <div class="icon">
        <div class="hamburger hamburger-middle"></div>
    </div>

    <section class="menu-container">
        <div class="link-container-menu">
            <a class="menu-container-link" href="profil.php">ACCUEIL</a>
            <a class="menu-container-link" href="profil.php">ARTICLES</a>
            <a class="menu-container-link" href="about.html">A PROPOS</a>
            <a class="menu-container-link" href="contact.html">CONTACT</a>
            <a class="menu-container-link" href="disconnectUser.php">Se déconnecter</a>
            <a class="menu-container-link" href="editUserProfil.php"><?= $userInfo['Login'] ?></a>
        </div>      
    </section>

    <section class="nav-bar">
        <a class="no-display" href="profil.php"><img class="logo-header" src="img/logo.png"></a>
        <a class="active" href="profil.php">Articles</a>
        <a href="about.html">A propos</a>
        <a href="contact.html">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a href="editUserProfil.php"><?= $userInfo['Login'] ?></a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>


    <div class="fixed-bar">
        <div class="research-input-div">
            <input class="research-input" type="research" placeholder="Rechercher" name="">
            <img class="img-search" src="img/search.png">
            <hr class="horizontal-bar">
        </div>
        <div class="check-input-div">
            <h3>Trier par...</h3>
            <div>
                <label>
                <input class="" type="checkbox" name="">
                <span></span>
                Nombre de like
                </label>
            </div>
            <div>
                <label>
                <input class="" type="checkbox" name="">
                Date de publication</label>
            </div>
            <hr class="horizontal-bar">
        </div>

        <div class="plus-vus-div">
            <div class="les-plus-vus-container">
                <h3>Les plus likés</h3>
                <p><span class="big-number">1</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod… </p>
                <hr class="horizontal-bar">
                <p><span class="big-number">2</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod… </p>
                <hr class="horizontal-bar">
                <p><span class="big-number">3</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod… </p>
            </div>
            <hr class="horizontal-bar">
        </div>

        <div class="social-div">
            <h3>Nos réseaux sociaux</h3>
            <a href="#"><p><img class="logo-rs" src="img/insta.png"> gavebleu</p></a>
            <a href="#"><p><img class="logo-rs" src="img/fb.png"> Gavé Bleu</p></a>

            <hr class="horizontal-bar">
        </div>
    </div>
    <h1>Profil de <?= $userInfo['FirstName'] ?></h1>
    <p>Pseudo = <?= $userInfo['Login'] ?></p>
    <?php
    if(isset($_SESSION['EMail']) AND $userInfo['EMail'] == $_SESSION['EMail']){
    ?>
    <a href="editUserProfil.php">Editer mon Profil</a>
    <a href="disconnectUser.php">Se déconnecter</a>

 <h2>Nos Articles</h2>
  <section class="first-content-container">
    <?php
        include "conect.php";
              $Article = $bdPdo ->query('SELECT * FROM Article');

            ?>

                <?php while($v = $Article->fetch()){ ?>
                    <div class="photo-text-container">
                        <div class="photo-container">
                            <?php
                             $image = $v['UrlPhotA'];
                             ?>
                        <img src="<?= $v['UrlPhotA'] ?>"/>
                         </div>

                         <div class="text-container">                        
                            <h3>Article num <?= $v['NumArt']?> : <?= $v['LibTitrA']?></h3>
                            <p><?= $v['LibChapoA']?></p>
                            <p><?= $v['DtCreA']?></p>
                            <p> <?= $v['Likes']?> likes</p>
                        </div>
                        <a class="lire-suite" href="articleC.php?id=<?= $v['NumArt']?>&amp;EMail=<?= $_SESSION['EMail']?>&amp;l=0">Lire -></a>
                    </div>
                <?php }
                include "disconect.php";
                ?>

                <?php
                    if(isset($erreur)){ echo $erreur;}
                ?>
        </section>


    <?php
    }
    ?>
    <footer>
        <div class="footer-link-admin">
            <a href="#"><img class="logo-footer" src="img/logo.png"></a>
            <a class="admin-link" href="mdp.php">Partie administration</a>
        </div>
        <a href="#">MENTIONS LEGALES</a>
        <a href="#">COOKIES</a>
        <a href="#">CHARTE DE MODERATION</a>
    </footer>
</body>
</html>

<?php }else{
    header("Location: index.php");
} ?>
