<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supr Article </title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumArt = $_GET['NumArt'];
  
  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM article WHERE NumArt=:NumArt');

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

  $query->closeCursor();
  echo "L'Article numéro <i>" . $NumArt . "</i> a bien été supprimée !";
  echo "<br>";
  echo "Si ton article ne se supprime pas, c'est qu'il a des mots clée et/ou des commentaires, supprime les et recommence !";
  echo "<br>";
  $bdPDO = NULL;
  // echo "<h2>Closed connection !</h2>";
  
?>
<a href="vewArti.php">Retour</a>
</body>
</html>

