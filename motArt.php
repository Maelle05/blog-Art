<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Liaison Mot Clé Articles</title>
</head>
<body>

    <?php

        include 'conect.php';

     $SelectMot = $bdPdo ->query('SELECT * FROM motcle');
     $SelectArt = $bdPdo ->query('SELECT * FROM article');
     $SelectArt1 = $bdPdo ->query('SELECT * FROM article');
     $SelectAM = $bdPdo ->query('SELECT * FROM motclearticle')
    ?>
    <h2>Liaison Mot Clé - Articles</h2>
    <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

                    if (((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
                    AND ((isset($_POST['NumMoCle'])) AND !empty($_POST['NumMoCle']))){
                        $erreur = false;

                        $NumArt = htmlspecialchars($_POST['NumArt']);
                        $NumMoCle = htmlspecialchars($_POST['NumMoCle']);

                            try {
                                $stmt = $bdPdo->prepare("INSERT INTO motclearticle ( NumArt, NumMoCle) VALUES (:NumArt, :NumMoCle)");
                                $stmt->bindParam(':NumArt', $NumArt);
                                $stmt->bindParam(':NumMoCle', $NumMoCle);

                                $stmt->execute();
                            } catch (\Throwable $th) {
                                //throw $th;
                            }
                        }


                }

    ?>

    <form action="motArt.php" name="formMotArt" method="post">

        <label for="">Pour quelle Article ?</label>
            <select name="NumArt" >
                <?php while($a = $SelectArt1->fetch()){ ?>
                        <option value="<?= $a['NumArt']?>" ><?= $a['NumArt']?> <?= $a['LibTitrA']?> </option>
                <?php }?>
            </select>


        <label for="">Quel Mot Clé ?</label>
        <select name="NumMoCle" >
            <?php while($l = $SelectMot->fetch()){ ?>
                    <option value="<?= $l['NumMoCle']?>" > <?= $l['LibMoCle']?> </option>
            <?php }?>
        </select>
                <br>
        <input type="submit" name="Submit" value="Validé">
    </form>
    <br>
    <br>
    <br>
    <h2>Les Liaisons deja effectuées</h2>

    <?php while($v = $SelectArt->fetch()){ ?>
                    <div>
                        <h3>Article numéro <?= $v['NumArt']?> : <?= $v['LibTitrA']?></h3>
                        <p>Mots Clés:</p>
                        <?php
                            $NumArt = $v['NumArt'];
                            $bdPdo->beginTransaction();

                            $query = $bdPdo->prepare('SELECT * FROM motclearticle WHERE NumArt=:NumArt;');

                            $query->execute(
                              array(
                                ':NumArt' => $NumArt
                              )
                            );

                            $bdPdo->commit();
                        ?>

                        <ul>
                            <?php while($v = $query->fetch()){ ?>
                                <li>
                            <?php
                                $NumMot = $v['NumMoCle'];
                                $bdPdo->beginTransaction();

                                $Mot = $bdPdo->prepare('SELECT * FROM motcle WHERE NumMoCle=:NumMot;');

                                $Mot->execute(
                                  array(
                                    ':NumMot' => $NumMot
                                  )
                                );

                                $bdPdo->commit();
                                $m = $Mot->fetch()

                            ?>
                            <?= $m['LibMoCle']?>
                            <a href="DeleteLaison.php?NumMoCle=<?php echo $v['NumMoCle'] ?>&amp;NumArt=<?php echo $v['NumArt'] ?>">Supprimer</a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                <?php }
                include "disconect.php";
                ?>
                <a href="admin.php?mot_de_passe=MMI21">Retour</a>

</body>
</html>
