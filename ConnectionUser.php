<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>

<?php 
    include 'conect.php';

    if(isset($_POST['formC']))
    {
       $EMail = htmlspecialchars($_POST["EMail"]);
       $Pass = htmlspecialchars($_POST['Pass']);
       if(!empty($EMail)AND !empty($Pass))
       {
            $reqUser = $bdPdo->prepare("SELECT * FROM user WHERE EMail = ? AND Pass = ? ");
            $reqUser->execute(array($EMail, $Pass)); 
            $userexist = $reqUser->rowCount();
            if($userexist == 1){

                $userInfo = $reqUser->fetch();
                $_SESSION['EMail'] = $userInfo['EMail'];
                $_SESSION['Login'] = $userInfo['Login'];
                $_SESSION['FirstName'] = $userInfo['FirstName'];
                $_SESSION['LastName'] = $userInfo['LastName'];
                header("Location: profil.php?EMail=".$_SESSION['EMail']."");

            }else{
                echo "Mauvais Mail ou Mot de Passe";
            }
       }else{
           echo "Tous les champs doivent étre completés ";
       }
    }

?>

<h2>Connection </h2>
<form action="ConnectionUser.php" name="formUser" method="post">

    <label for="">Ton Mail</label>
    <input type="mail" name="EMail" id="" ><br>
    

    <label for="">Password</label>
    <input type="text" name="Pass" placeholder="max 25 char ." maxlength="25" id="" ><br>
     
    <input type="submit" name="formC" value="Se conecter">

</form>
<p>Pas encore de compte ? Inscrivez-vous <a href="InscriptionUser.php">ICI</a> </p>

<br>
<a href="index.php">Retour</a>




<?php include 'disconect.php';?>

    
</body>
</html>