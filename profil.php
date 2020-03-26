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
            <a class="menu-container-link" href="profil.php?EMail=<?=$EMail?> ">ACCUEIL</a>
            <a class="menu-container-link" href="profil.php?EMail=<?=$EMail?> ">ARTICLES</a>
            <a class="menu-container-link" href="about.php?EMail=<?=$EMail?>">A PROPOS</a>
            <a class="menu-container-link" href="contact.php?EMail=<?=$EMail?>">CONTACT</a>
            <a class="menu-container-link" href="disconnectUser.php">Se déconnecter</a>
            <a class="menu-container-link" href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
        </div>
    </section>

    <section class="nav-bar">
        <a class="no-display" href="profil.php?EMail=<?=$EMail?> "><img class="logo-header" src="img/logo.png"></a>
        <a class="active" href="profil.php?EMail=<?=$EMail?> ">Articles</a>
        <a href="about.php?EMail=<?=$EMail?> ">A propos</a>
        <a href="contact.php?EMail=<?=$EMail?>">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>


    <div class="fixed-bar">
        <div class="research-input-div">
            <form method="POST" action="">
                <input class="research-input" type="search" name="search" placeholder="Rechercher">
                <button type="submit" name="rechercher" value="Rechercher"><img class="img-search" src="img/search.png"></button>
            </form>
            <hr class="horizontal-bar">
        </div>
        <div class="check-input-div">
            <h3>Trier par...</h3>
            <div>
                <label>
                    <form method="POST" action="">
                        <input type="hidden" name="triLikes" value="Likes">
                        <input type="submit" name="submitLikes" value="Nombre de likes">
                    </form>
                </label>
            </div>
            <div>
                <label>
                    <form method="POST" action="">
                        <input type="hidden" name="triDate" value="DtCreA">
                        <input type="submit" name="submitDate" value="Date de publication">
                    </form>
                </label>
            </div>
            <div>
                <label>
                    <form method="POST" action="">
                        <input type="hidden" name="triAlphabet" value="LibTitrA">
                        <input type="submit" name="submitAlphabet" value="Ordre alphabétique">
                    </form>
                </label>
            </div>
            <hr class="horizontal-bar">
        </div>

        <div class="plus-vus-div">
            <div class="les-plus-vus-container">
                <h3>Les plus likés</h3>
                <?php
                include "conect.php";
                $Article = $bdPdo ->query('SELECT * FROM Article ORDER BY Likes DESC ');
                $nbArticle = 1;
                while(($v = $Article->fetch()) AND $nbArticle <= 3) {
                ?>
                <p><span class="big-number"><?= $nbArticle; ?></span><a href="article.php?id=<?= $v['NumArt']?>"><?= $v['LibTitrA']; ?></a></p>
                <hr class="horizontal-bar">
                <?php
                    $nbArticle++;
                }
                $nbArticle = NULL;
                ?>
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
    <?php
    if(isset($_SESSION['EMail']) AND $userInfo['EMail'] == $_SESSION['EMail']){
    ?>
  <section class="first-content-container">
    <?php
            $submit1 = isset($_POST['submitLikes']) ? $_POST['submitLikes'] : '';
            $submit2 = isset($_POST['submitDate']) ? $_POST['submitDate'] : '';
            $submit3 = isset($_POST['submitAlphabet']) ? $_POST['submitAlphabet'] : '';
            if (((isset($_POST['triLikes'])) AND !empty($_POST['triLikes']))
            AND (!empty($_POST['submitLikes']) AND ($submit1 == "Nombre de likes"))) {
                $Article = $bdPdo ->query('SELECT * FROM Article ORDER BY Likes DESC ');
            }
            elseif (((isset($_POST['triDate'])) AND !empty($_POST['triDate']))
            AND (!empty($_POST['submitDate']) AND ($submit2 == "Date de publication"))) {
                $Article = $bdPdo ->query('SELECT * FROM Article ORDER BY DtCreA DESC ');
            }
            elseif (((isset($_POST['triAlphabet'])) AND !empty($_POST['triAlphabet']))
            AND (!empty($_POST['submitAlphabet']) AND ($submit3 == "Ordre alphabétique"))) {
                $Article = $bdPdo ->query('SELECT * FROM Article ORDER BY LibTitrA ASC ');
            }
            else {
                $Article = $bdPdo ->query('SELECT * FROM Article ORDER BY NumArt DESC ');
            }


            $submit4 = isset($_POST['rechercher']) ? $_POST['rechercher'] : '';
            if (((isset($_POST['search'])) AND !empty($_POST['search']))
            AND (!empty($_POST['rechercher']) AND ($submit4 == "Rechercher"))) {
                while($v = $Article->fetch()){

                    if (preg_match('#'.$_POST['search'].'#i', $v['LibTitrA'])) {

                        ?><div class="photo-text-container">
                            <div class="photo-container">
                                <?php
                                 $image = $v['UrlPhotA'];
                                 ?>
                                <img src="./uploads/<?= $v['UrlPhotA'] ?>"/>
                            </div>
                            <div class="text-container">
                                <h3><?= $v['LibTitrA']?></h3>
                                <p><?= $v['LibChapoA']?></p>
                                <p><?= $v['DtCreA']?></p>
                                <p> <?= $v['Likes']?> likes</p>
                            </div>
                            <a class="lire-suite" href="articleC.php?id=<?= $v['NumArt']?>&amp;EMail=<?= $_SESSION['EMail']?>&amp;l=0">Lire -></a>

                        </div>

                <?php
                    }
                    else {
                        $haveMotcle = false;
                        $motcles = $bdPdo ->prepare('SELECT m.LibMoCle motcle FROM MOTCLEARTICLE n INNER JOIN MOTCLE m ON m.NumMoCle = n.NumMoCle WHERE NumArt = ?');
                        $motcles->execute(array($v['NumArt']));

                        while($m = $motcles->fetch()) {
                            if (preg_match('#'.$_POST['search'].'#i', $m['motcle'])) {
                                $haveMotcle = true;
                            }
                        }

                        if ($haveMotcle) {
                            ?><div class="photo-text-container">
                            <div class="photo-container">
                                <?php
                                 $image = $v['UrlPhotA'];
                                 ?>
                                <img src="./uploads/<?= $v['UrlPhotA'] ?>"/>
                            </div>
                            <div class="text-container">
                                <h3><?= $v['LibTitrA']?></h3>
                                <p><?= $v['LibChapoA']?></p>
                                <p><?= $v['DtCreA']?></p>
                                <p> <?= $v['Likes']?> likes</p>
                            </div>
                            <a class="lire-suite" href="articleC.php?id=<?= $v['NumArt']?>&amp;EMail=<?= $_SESSION['EMail']?>&amp;l=0">Lire -></a>

                        </div>
                        <?php
                        }
                    }
                }
            }
            else {
                while($v = $Article->fetch()) {
                    ?>
                    <div class="photo-text-container">
                        <div class="photo-container">
                            <?php
                             $image = $v['UrlPhotA'];
                             ?>
                            <img src="./uploads/<?= $v['UrlPhotA'] ?>"/>
                        </div>
                        <div class="text-container">
                            <h3><?= $v['LibTitrA']?></h3>
                            <p><?= $v['LibChapoA']?></p>
                            <p><?= $v['DtCreA']?></p>
                            <p> <?= $v['Likes']?> likes</p>
                        </div>
                        <a class="lire-suite" href="articleC.php?id=<?= $v['NumArt']?>&amp;EMail=<?= $_SESSION['EMail']?>&amp;l=0">Lire -></a>

                    </div>
                <?php
                }
            }
                include "disconect.php";
                ?>
                <!-- <div class="all-article-container">
                    <a class="all-article" href="">Voir tous les articles</a>
                </div> -->
                <?php
                    if(isset($erreur)){ echo $erreur;}
                ?>
        </section>


    <?php
    }
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

<?php }else{
    header("Location: index.php");
} ?>
