<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supr Liaison </title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumMoCle = $_GET['NumMoCle'];
  $NumArt = $_GET['NumArt'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM motclearticle WHERE NumMoCle=:NumMoCle AND NumArt=:NumArt ');

    $query->execute(
      array(
        ':NumMoCle' => $NumMoCle,
        ':NumArt' => $NumArt
      )
    );

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }

  $query->closeCursor();
  echo "La Liaison du mot clé numéro <i>" . $NumMoCle ." et l'article numéro " . $NumArt . "</i> a bien été supprimé !";
  echo "<br>";
  $bdPDO = NULL;
  // echo "<h2>Closed connection !</h2>";
  
?>
<a href="motArt.php">Retour</a>
</body>
</html>