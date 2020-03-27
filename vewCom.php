<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
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

  if($NumArt == NULL){
    echo "Cet article n'existe pas";
  }else{
?>


<section class="nav-bar">
    <h1 class="admin-title">Gavé Bleu Administration</h1>
</section>



<section class="admin-pannel-container admin-pannel-container-com ">

  <h1>Les commentaires de l'article numéro <?= $NumArt ?> </h1>
  <ul>
      <?php while($v = $query->fetch()){ ?>
          <li>"<?= $v['LibCom']?>" de <?= $v['PseudoAuteur']?> .  Contacter via cette adresse Mail :  <?=$v['EmailAuteur']?> | <a href="DeleteCom.php?NumCom=<?php echo $v['NumCom'] ?>">Supprimer</a> </li>
      <?php }?>
  </ul>
  <br>
  <br>
  <p>Si il y a rien qui s'affiche c'est qu'il n'y a pas de commentaires !</p>

      <?php } ?>

  <a href="admin.php?mot_de_passe=MMI21">Retour</a>
</section>
<footer>
    <p class="copyright" style="text-align: center;">
        &copy; 2020 <span>Gavé Bleu</span>. All Rights Reserved.
        <br>
        <a href="https://icons8.com/icon/">Icons by Icons8</a>
      </p>

</footer>
</body>
</html>
