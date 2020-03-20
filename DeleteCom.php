<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Supprimer Commentaire </title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumCom = $_GET['NumCom'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM comment WHERE NumCom=:NumCom;');

    $query->execute(
      array(
        ':NumCom' => $NumCom
      )
    );

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }

  $query->closeCursor();
  echo "Le Commentaire numéro <i>" . $NumCom . "</i> a bien été supprimé !";
  echo "<br>";
  $bdPDO = NULL;
  // echo "<h2>Closed connection !</h2>";

?>
<a href="admin.php?mot_de_passe=MMI21">Retour</a>
</body>
</html>
