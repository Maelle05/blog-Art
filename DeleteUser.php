<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Utilisateur</title>
</head>
<body>
    <?php
  include 'conect.php';

  $NumUser = $_GET['NumUser'];

  try {
    $bdPdo->beginTransaction();

    $query = $bdPdo->prepare('DELETE FROM user WHERE Login=:NumUser');

    $query->execute(
      array(
        ':NumUser' => $NumUser
      )
    );

    $query->closeCursor();
    echo "L'Utilisateur'<i>" . $NumUser . "</i> a bien été supprimé !";
    echo "<br>";
    $bdPDO = NULL;
    // echo "<h2>Closed connection !</h2>";

    $bdPdo->commit();
  }
  catch (PDOException $e) {
    $bdPdo->rollBack();
  }



?>
<a href="vewUser.php">Retour</a>
</body>
</html>
