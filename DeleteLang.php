<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Supprimer Langue</title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumLang = $_GET['NumLang'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM LANGUE WHERE NumLang=:NumLang;');

    $query->execute(
      array(
        ':NumLang' => $NumLang
      )
    );

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }

  $query->closeCursor();
  echo "La langue <i>" . $NumLang . "</i> a bien été supprimée !";
  echo "<br>";
  $bdPDO = NULL;
  // echo "<h2>Closed connection !</h2>";

?>
<a href="vewLang.php">Retour</a>
</body>
</html>
