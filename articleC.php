<?php
session_start();

include 'conect.php';

function likes() {
    include 'conect.php';

        $likes = $_GET['likes'];
        $get_id = $_GET['id'];
        $likes = $likes - 1;
        $like = $bdPdo ->prepare('UPDATE article SET likes = :likes WHERE  NumArt ="'.$get_id.'"');
        $like->execute(
            array(
                ':likes'=> $likes
            )
        );

}

  if (isset($_GET['like'])) {
    likes();
  }



function getNextNumCom() {

    // Connexion à la BDD
    include 'conect.php';

    $requete = "SELECT MAX(NumCom) AS NumCom FROM COMMENT;";
    $result = $bdPdo->query($requete);

    if ($result) {
        $tuple = $result->fetch();
        $NumCom = $tuple["NumCom"];
        // No PK suivante COMMENT
        $NumCom++;

    }   // End of if ($result)
    return $NumCom;
  }


  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $EMail = htmlspecialchars($_POST['EMail']);
}else{
    $EMail = htmlspecialchars($_SESSION['EMail']);

}

if(isset($_SESSION['EMail'])){

    $EMail = htmlspecialchars($_SESSION['EMail']);
    $reqUser = $bdPdo->prepare("SELECT * FROM USER WHERE EMAIL = ?");
    $reqUser->execute(array($EMail));
    $userInfo = $reqUser->fetch();


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
        <a href="about.php?EMail=<?=$EMail?>">A propos</a>
        <a href="contact.php?EMail=<?=$EMail?>">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

    <?php
        include "conect.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numArticle =htmlspecialchars($_POST['id']);
        }else{
            $numArticle =htmlspecialchars($_GET['id']);
        }

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

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if (((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
            AND ((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
           ) {
                $erreur = false;

                $USER = $bdPdo ->prepare('SELECT * FROM USER WHERE EMail =?');



                $USER->execute(array($EMail));
                if($USER->rowCount() == 1){
                    $USER =$USER->fetch();
                    $PseudoAuteur = $USER['Login'];
                    $EmailAuteur = $USER['EMail'];
                }else{
                    die('Ce USER n\'existe pas !');
                }

                $LibCom = htmlspecialchars($_POST['LibCom']);
                $NumArt = htmlspecialchars($_POST['NumArt']);
                $NumCom = getNextNumCom();
                $TitrCom = $LibCom;
                $date = date("Y-m-d H:i:s");


                    try {
                        $stmt = $bdPdo->prepare("INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, EmailAuteur, TitrCom, LibCom, NumArt) VALUES (:NumCom,:DtCreC,:PseudoAuteur,:EmailAuteur,:TitrCom,:LibCom, :NumArt)");


                        $stmt->bindParam(':NumCom', $NumCom);
                        $stmt->bindParam(':DtCreC', $date);
                        $stmt->bindParam(':PseudoAuteur', $PseudoAuteur);
                        $stmt->bindParam(':EmailAuteur', $EmailAuteur);
                        $stmt->bindParam(':TitrCom', $TitrCom);
                        $stmt->bindParam(':LibCom', $LibCom);
                        $stmt->bindParam(':NumArt', $NumArt);

                        $stmt->execute();

                        echo "Le Nouveau commentaire à bien ete ajouté à l'article numéro " .$NumArt . "!";
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }
        }

    ?>

    <section class="article-container">

        <h3><?= $LibTitrA ?> </h3>

          
        <p class="publie"><?= $DtCreA ?></p>
        <p class="chapo"><?= $LibAccrochA ?></p>
        <p class="first-paragraphe"><?= $Parag1A ?></p>
        <img class="illustration" src="./uploads/<?= $UrlPhotA ?>" alt="">
        <p class="sous-titre"><?= $LibSsTitr1 ?></p>
        <p class="second-paragraphe"><?= $Parag2A ?></p>
        <img class="illustration" src="./uploads/<?= $UrlPhotA ?>" alt="">
        <p class="sous-titre"><?= $LibSsTitr2 ?></p>
        <p class="third-paragraphe"><?= $Parag3A ?></p>
        <p class="conclusion"><?= $LibConclA ?></p>
        <div class="articles-logo-container">
            
                 
            <a style="display: flex; flex-direction: column; align-items: center;" href="articleCd.php?like=true&amp;EMail=<?= $_SESSION['EMail']?>&amp;id=<?= $NumArt?>&amp;likes=<?= $Likes?>"><img src="img/like.png"><?= $Likes ?> </a>
           
            <a href=""><img src="img/share.png"></a>
        </div>
        <p>Mots-Clés</p>
        <?php  
                $numArticle = $NumArt;
                $motcle = $bdPdo ->prepare('SELECT * FROM motclearticle WHERE NumArt =?');
            
                $motcle->execute(array($numArticle));
                ?>
                <ul style="margin-top: 0;">
              <?php  while($mots =$motcle->fetch()){ ?>
                            <?php  
                                $NumMoCle = $mots['NumMoCle'];
                                $mot = $bdPdo ->prepare('SELECT * FROM motcle WHERE NumMoCle =?');
                            
                                $mot->execute(array($NumMoCle));

                                while($motcl =$mot->fetch()){ ?>
                                            <li style="margin-top: 0; padding-left: 0;"><?= $motcl['LibMoCle'] ?></li>                           
                            <?php }?>
             <?php }?>
             </ul>

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

                    <form class="commentaire-form" action="articleC.php" method="post">
                        <input type="hidden" name="NumArt" value="<?= $NumArt ?>">
                        <input type="hidden" name="EMail" value="<?=$EMail?>">
                        <input type="hidden" name="id" value="<?=$numArticle?>">
                        <input class="commentaire-input" type="text" placeholder="Écrire un commentaire…" name="LibCom">
                        <input class="submit-commentaire" type="submit" value="Ajouter">
                    </form>


                <?php
                     include "disconect.php";
                ?>
                

                <?php
                    if(isset($erreur)){ echo $erreur;}
                ?>
                  <?php
    }
    ?>

    <footer>
        <div class="footer-link-admin">
            <a href="mdp.php"><img class="logo-footer" src="img/logo.png"></a>
            <a class="admin-link" href="mdp.php">Partie administration</a>
        </div>
        <a href="mentions.php">MENTIONS LEGALES</a>
        <a href="#">COOKIES</a>
        <a href="moderation.php">CHARTE DE MODERATION</a>
    </footer>


</body>
</html>
