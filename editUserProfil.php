<?php 
session_start();

include 'conect.php';

if(isset($_SESSION['EMail'])){


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
</head>
<body>
    <h1>Edition de mon Profil</h1>
    <p>Pas encore Codé</p>
    <form action="editUserProfil.php" method="post">

    </form>
    <a href="disconnectUser.php">Se déconnecter</a>
    
</body>
</html>

<?php }else{
    header("Location: index.php");
} ?>