<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supr Mot Clé</title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumMoCle = $_GET['NumMoCle'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM MOTCLE WHERE NumMoCle=:NumMoCle');

    $query->execute(
      array(
        ':NumMoCle' => $NumMoCle
      )
    );

    $query->closeCursor();
    echo "La Thématique <i>" . $NumMoCle . "</i> a bien été supprimée !";
    echo "<br>";
    $bdPDO = NULL;
    // echo "<h2>Closed connection !</h2>";

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }

 
  
?>
<a href="vewMot.php">Retour</a>
</body>
</html>