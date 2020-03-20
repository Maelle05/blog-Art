<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Supprimer Article </title>
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
  echo "L'Article numéro <i>" . $NumArt . "</i> a bien été supprimé !";
  echo "<br>";
  echo "Si ton article ne se supprime pas, c'est qu'il a des mots clés et/ou des commentaires, supprime les et recommence !";
  echo "<br>";
  $bdPDO = NULL;
  // echo "<h2>Closed connection !</h2>";

?>
<a href="vewArti.php">Retour</a>
</body>
</html>
