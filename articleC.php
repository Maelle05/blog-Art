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
    <title>Article</title>
</head>
<body>

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
            <h1><?= $LibTitrA ?> </h1>

                    <div>
                        <p><?= $DtCreA ?></p>
                        <p><?= $LibAccrochA ?></p>
                        <p><?= $Parag1A ?></p>
                        <img src="<?= $UrlPhotA ?>" alt="">
                        <p><?= $LibSsTitr1 ?></p>
                        <p><?= $Parag2A ?></p>
                        <img src="<?= $UrlPhotA ?>" alt="">
                        <p><?= $LibSsTitr2 ?></p>
                        <p><?= $Parag3A ?></p>
                        <p><?= $LibConclA ?></p>
                        <div><a href="articleCd.php?like=true&amp;EMail=<?= $_SESSION['EMail']?>&amp;id=<?= $NumArt?>&amp;likes=<?= $Likes?>"><?= $Likes ?> Likes</a></div>
                    </div>

                    <h2>Commentaires</h2>
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
                        <ul>
                            <?php while($v = $query->fetch()){ ?>
                                <li>"<?= $v['LibCom']?>" de <?= $v['PseudoAuteur']?> </li>
                            <?php }?>
                        </ul>
                    </div>

                    <form action="articleC.php" method="post">
                            <label for="">Mettre un commentaire</label>
                            <input type="hidden" name="NumArt" value="<?= $NumArt ?>">
                            <input type="hidden" name="EMail" value="<?=$EMail?>">
                            <input type="hidden" name="id" value="<?=$numArticle?>">
                            <input type="text" name="LibCom">
                            <input type="submit" value="Poster">
                    </form>


                <?php
                     include "disconect.php";
                ?>
                <a href="profil.php?EMail=<?=$EMail?> ">Retour</a>

           <br />
                <?php
                    if(isset($erreur)){ echo $erreur;}
                ?>
                  <?php
    }
    ?>


</body>
</html>
