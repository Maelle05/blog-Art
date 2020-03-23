<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Connexion</title>
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

  <section class="menu-container">
        <div class="link-container-menu">
            <a class="menu-container-link" href="index.php">ACCUEIL</a>
            <a class="menu-container-link" href="index.php">ARTICLES</a>
            <a class="menu-container-link" href="about.php">A PROPOS</a>
            <a class="menu-container-link" href="contact.php">CONTACT</a>
            <a class="menu-container-link" href="ConnectionUser.php">Connexion</a>
        </div>      
    </section>

    <section class="nav-bar">
        <a class="no-display" href="index.php"><img class="logo-header" src="img/logo.png"></a>
        <a href="index.php">Articles</a>
        <a href="about.php">A propos</a>
        <a href="contact.php">Contact</a>
        <a class="active" href="ConnectionUser.php">Connexion</a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>


  <section class="article-container contact-container">
    <h3>CONNEXION</h3>
    <form class="connexion-input-container" action="ConnectionUser.php" name="formUser" method="post">

        <label for="">Adresse Mail</label>
        <input class="connexion-input" type="mail" name="EMail" id="" >


        <label for="">Mot de passe</label>
        <input class="connexion-input" type="text" name="Pass" placeholder="max 25 char ." maxlength="25" id="" >

        <input class="send-button" type="submit" name="formC" value="Se connecter">

        <p>Pas encore de compte ?<a href="InscriptionUser.php"> Inscrivez-vous ICI</a></p>

    </form>
    
  </section>




<?php include 'disconect.php';?>

  <footer>
    <div class="footer-link-admin">
        <a href="#"><img class="logo-footer" src="img/logo.png"></a>
        <a class="admin-link" href="mdp.php">Partie administration</a>
    </div>
    <a href="#">MENTIONS LEGALES</a>
    <a href="#">COOKIES</a>
    <a href="#">CHARTE DE MODERATION</a>
  </footer>
</body>
</html>
