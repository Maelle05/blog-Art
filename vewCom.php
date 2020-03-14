<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vew Commentaires</title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumArt = $_GET['id'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('SELECT * FROM COMMENT WHERE NumArt=:NumArt;');

    $query->execute(
      array(
        ':NumArt' => $NumArt
      )
    );

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }  
?>

<h1>Les comentaires de l'articles numéro <?= $NumArt ?> </h1>
<ul>
    <?php while($v = $query->fetch()){ ?>
        <li>"<?= $v['LibCom']?>" de <?= $v['PseudoAuteur']?> .  Contacter via cette address Mail :  <?=$v['EmailAuteur']?> | <a href="DeleteCom.php?NumCom=<?php echo $v['NumCom'] ?>">Supprimer</a> </li>               
    <?php }?>
</ul> 
<br>
<br>
<p>Si il y a rien qui s'affiche c'est qu'il y a pas de commentaires !</p>



<a href="admin.php">Retour</a>
</body>
</html>

