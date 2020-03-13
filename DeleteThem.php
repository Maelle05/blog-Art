<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supr Thematique</title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumThem = $_GET['NumThem'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM thematique WHERE NumThem=:NumThem');

    $query->execute(
      array(
        ':NumThem' => $NumThem
      )
    );

    $query->closeCursor();
    echo "La Thématique <i>" . $NumThem . "</i> a bien été supprimée !";
    echo "<br>";
    $bdPDO = NULL;
    // echo "<h2>Closed connection !</h2>";

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }

 
  
?>
<a href="vewThem.php">Retour</a>
</body>
</html>

