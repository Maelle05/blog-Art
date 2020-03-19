<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Article</title>
</head>
<body>
    <?php

       include 'conect.php';

       $SelectAngle = $bdPdo ->query('SELECT * FROM angle');
       $SelectTheme = $bdPdo ->query('SELECT * FROM thematique');
       $SelectLang = $bdPdo ->query('SELECT * FROM Langue');

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);

            $Article = $bdPdo->prepare('SELECT * FROM article WHERE NumArt ="'.$get_id.'"');
            $Article->execute(
                array($get_id)
            );

            if($Article->rowCount() == 1){
                $Article =$Article->fetch();
                $NumArt = $get_id;
                $LibTitrA = $Article['LibTitrA'];
                $LibChapoA = $Article['LibChapoA'];
                $LibAccrochA = $Article['LibAccrochA'];
                $Parag1A = $Article['Parag1A'];
                $LibSsTitr1 = $Article['LibSsTitr1'];
                $Parag2A = $Article['Parag2A'];
                $LibSsTitr2 = $Article['LibSsTitr2'];
                $Parag3A = $Article['Parag3A'];
                $LibConclA = $Article['LibConclA'];
                $UrlPhotA = $Article['UrlPhotA'];
                $NumAngl = $Article['NumAngl'];
                $NumThem = $Article['NumThem'];
                $NumLang = $Article['NumLang'];


            }else{
                die('Cette Article n\'existe pas !');
            }
        }else{
            echo('<a href="vewArti.php">Retour</a>');
            die('ERREUR');
        }

        if($_SERVER["REQUEST_METHOD"] == "GET"){


                if (((isset($_GET['LibTitrA'])) AND !empty($_GET['LibTitrA']))
                AND ((isset($_GET['LibChapoA'])) AND !empty($_GET['LibChapoA']))
                AND ((isset($_GET['LibAccrochA'])) AND !empty($_GET['LibAccrochA']))
                AND ((isset($_GET['Parag1A'])) AND !empty($_GET['Parag1A']))
                AND ((isset($_GET['LibSsTitr1'])) AND !empty($_GET['LibSsTitr1']))
                AND ((isset($_GET['Parag2A'])) AND !empty($_GET['Parag2A']))
                AND ((isset($_GET['LibSsTitr2'])) AND !empty($_GET['LibSsTitr2']))
                AND ((isset($_GET['Parag3A'])) AND !empty($_GET['Parag3A']))
                AND ((isset($_GET['LibConclA'])) AND !empty($_GET['LibConclA']))
                AND ((isset($_GET['UrlPhotA'])) AND !empty($_GET['UrlPhotA']))
                AND ((isset($_GET['NumAngl'])) AND !empty($_GET['NumAngl']))
                AND ((isset($_GET['NumThem'])) AND !empty($_GET['NumThem']))
                AND ((isset($_GET['NumLang'])) AND !empty($_GET['NumLang']))
                    ) {
                    $erreur = false;

                    $LibTitrA = htmlspecialchars($_GET['LibTitrA']);
                    $LibChapoA = htmlspecialchars($_GET['LibChapoA']);
                    $LibAccrochA = htmlspecialchars($_GET['LibAccrochA']);
                    $Parag1A = htmlspecialchars($_GET['Parag1A']);
                    $LibSsTitr1 = htmlspecialchars($_GET['LibSsTitr1']);
                    $Parag2A = htmlspecialchars($_GET['Parag2A']);
                    $LibSsTitr2 = htmlspecialchars($_GET['LibSsTitr2']);
                    $Parag3A = htmlspecialchars($_GET['Parag3A']);
                    $LibConclA = htmlspecialchars($_GET['LibConclA']);
                    $UrlPhotA = htmlspecialchars($_GET['UrlPhotA']);
                    $NumAngl = htmlspecialchars($_GET['NumAngl']);
                    $NumThem = htmlspecialchars($_GET['NumThem']);
                    $NumLang = htmlspecialchars($_GET['NumLang']);


                    try{
                        //Début transaction
                        $bdPdo->beginTransaction();
                        // preparation de la requete Preparee dans une chane de caractere
                        // instruction incert Preparation
                        $query = $bdPdo->prepare('UPDATE article SET LibTitrA = :LibTitrA, LibChapoA = :LibChapoA, LibAccrochA = :LibAccrochA,
                         Parag1A = :Parag1A, LibSsTitr1 = :LibSsTitr1, Parag2A = :Parag2A, LibSsTitr2 = :LibSsTitr2, Parag3A = :Parag3A,
                         LibConclA = :LibConclA, UrlPhotA = :UrlPhotA, NumAngl = :NumAngl, NumThem = :NumThem, NumLang = :NumLang
                           WHERE  NumArt ="'.$get_id.'"');
                        // Execution du prepare lancement
                        $query->execute(
                            array(
                                ':LibTitrA'=> $LibTitrA,
                                ':LibChapoA'=> $LibChapoA,
                                ':LibAccrochA'=> $LibAccrochA,
                                ':Parag1A'=> $Parag1A,
                                ':LibSsTitr1'=> $LibSsTitr1,
                                ':Parag2A'=> $Parag2A,
                                ':LibSsTitr2'=> $LibSsTitr2,
                                ':Parag3A'=> $Parag3A,
                                ':LibConclA'=> $LibConclA,
                                ':UrlPhotA'=> $UrlPhotA,
                                ':NumAngl'=> $NumAngl,
                                ':NumThem'=> $NumThem,
                                ':NumLang'=> $NumLang,
                            )
                        );

                        // commite de la transaction (confirm insert)
                        $bdPdo->commit();

                    }catch( PDOException $e ){
                        //rollBack  (annule Insert)
                    $bdPdo->rollBack();
                    echo "erreur";
                    }

                    //liberer le curseur
                    $query->closeCursor();

                    // affichage des messsages d'erreur et/ou d'envoie
                    echo"Requete <b>update</b> a remplacé les valeurs de l'article numéro " . $NumArt . "!";
                    echo"<br />";


                }
            }


                include 'disconect.php';

        ?>

            <h2>Modifier l'Article Numéro <?= $NumArt?> </h2>
            <form action="editArti.php" name="formArticle" method="Get">

            <input type="hidden" name="id" value="<?= $NumArt ?>">

        <label for="">Titre de l'Article</label>
        <input type="text" name="LibTitrA"  value="<?= $LibTitrA ?>" ><br>

        <label for="">Chapô</label>
        <input type="text" name="LibChapoA" value="<?= $LibChapoA ?>" id="" ><br>

        <label for="">Accroche</label>
        <input type="text" name="LibAccrochA" value="<?= $LibAccrochA ?>"  id="" ><br>

        <label for="">Paragraphe 1</label>
        <input type="text" name="Parag1A" value="<?= $Parag1A ?>"  id="" ><br>

        <label for="">Sous Titre 1</label>
        <input type="text" name="LibSsTitr1" value="<?= $LibSsTitr1 ?>"  id="" ><br>

        <label for="">Paragraphe 2</label>
        <input type="text" name="Parag2A" value="<?= $Parag2A ?>" id="" ><br>

        <label for="">Sous Titre 2</label>
        <input type="text" name="LibSsTitr2" value="<?= $LibSsTitr2 ?>"  id="" ><br>

        <label for="">Paragraphe 3</label>
        <input type="text" name="Parag3A" value="<?= $Parag3A ?>"  id="" ><br>

        <label for="">Conclusion</label>
        <input type="text" name="LibConclA" value="<?= $LibConclA ?>" id="" ><br>

        <label for="">Image URL</label>
        <input type="text" name="UrlPhotA" value="<?= $UrlPhotA ?>"  id="" ><br>

        <label for="">L'angle de L'article</label>
        <select name="NumAngl" >
        <option value="<?= $NumAngl ?>"><?= $NumAngl ?></option>
            <?php while($v = $SelectAngle->fetch()){ ?>
                    <option value="<?= $v['NumAngl']?>" > <?= $v['LibAngl']?> </option>
            <?php }?>
        </select><br>

        <label for="">Thématique de L'article</label>
        <select name="NumThem" >
        <option value="<?= $NumThem ?>"><?= $NumThem ?></option>
            <?php while($t = $SelectTheme->fetch()){ ?>
                    <option value="<?= $t['NumThem']?>" > <?= $t['LibThem']?> </option>
            <?php }?>
        </select><br>

        <label for="">Langue de L'article</label>
        <select name="NumLang" >
            <option value="<?= $NumLang ?>"><?= $NumLang ?></option>
            <?php while($l = $SelectLang->fetch()){ ?>
                    <option value="<?= $l['NumLang']?>" > <?= $l['Lib1Lang']?> </option>
            <?php }?>
        </select><br>






        <input type="submit" name="Submit" value="Validé">
    </form>
            <a href="vewArti.php">Retour</a>
        </div>

</body>
</html>
