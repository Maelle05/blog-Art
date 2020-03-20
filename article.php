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
<body>
    
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
   
</body>
</html>