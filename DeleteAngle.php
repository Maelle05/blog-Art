<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Angle</title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumAngl = $_GET['NumAngl'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM angle WHERE NumAngl=:NumAngl');

    $query->execute(
      array(
        ':NumAngl' => $NumAngl
      )
    );

    $query->closeCursor();
    echo "L'angle <i>" . $NumAngl . "</i> a bien été supprimé !";
    echo "<br>";
    $bdPDO = NULL;
    // echo "<h2>Closed connection !</h2>";

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }



?>
<a href="vewAngle.php">Retour</a>
</body>
</html>
