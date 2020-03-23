<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Inscription</title>
</head>
<body>

<?php

ini_set('display_errors','on');

include 'conect.php';

        $Login ="";
        $Pass ="";
        $LastName ="";
        $FirstName ="";
        $EMail ="";

// Fonction de controle des saisies du formulaire
function ctrlSaisies($saisie) {

  // Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
  $saisie = trim($saisie);
  // Suppression des antislashs d'une chaîne
  $saisie = stripslashes($saisie);
  // Conversion des caractères spéciaux en entités HTML
  $saisie = htmlentities($saisie);

  return $saisie;
}




    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


            if (((isset($_POST['Login'])) AND !empty($_POST['Login']))
            AND ((isset($_POST['Pass'])) AND !empty($_POST['Pass']))
            AND ((isset($_POST['LastName'])) AND !empty($_POST['LastName']))
            AND ((isset($_POST['FirstName'])) AND !empty($_POST['FirstName']))
            AND ((isset($_POST['EMail'])) AND !empty($_POST['EMail']))) {
                $erreur = false;

                $Login = ctrlSaisies($_POST['Login']);
                $Pass = ctrlSaisies($_POST['Pass']);
                $LastName = ctrlSaisies($_POST['LastName']);
                $FirstName = ctrlSaisies($_POST['FirstName']);
                $EMail = ctrlSaisies($_POST['EMail']);

                $reqmail = $bdPdo->prepare("SELECT * FROM User WHERE EMail = ?");
                $reqmail->execute(array($EMail));
                $mailexist = $reqmail->rowCount();

                if( $mailexist == 0){
                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO User (Login, Pass, LastName, FirstName, EMail) VALUES (:Login, :Pass, :LastName, :FirstName, :EMail)");
                            $stmt->bindParam(':Login', $Login);
                            $stmt->bindParam(':Pass', $Pass);
                            $stmt->bindParam(':LastName', $LastName);
                            $stmt->bindParam(':FirstName', $FirstName);
                            $stmt->bindParam(':EMail', $EMail);

                            $stmt->execute();
                            echo "Vous vous êtes bien inscrit ! <br>  <a href=\"ConnectionUser.php\">Conectez - vous !</a>";
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }else{
                        echo "Adresse Mail déja utilisée !";
                     }
                }else{
                    echo "Vous devez commpléter tous les champs !";
                }
        }



?>


    <div class="icon">
        <div class="hamburger hamburger-middle"></div>
    </div>

    <section class="menu-container">
        <div class="link-container-menu">
            <a class="menu-container-link" href="index.php">ACCUEIL</a>
            <a class="menu-container-link" href="index.php">ARTICLES</a>
            <a class="menu-container-link" href="about.html">A PROPOS</a>
            <a class="menu-container-link" href="contact.html">CONTACT</a>
            <a class="menu-container-link" href="ConnectionUser.php">CONNECTION</a>
        </div>      
    </section>

    <section class="nav-bar">
        <a class="no-display" href="index.php"><img class="logo-header" src="img/logo.png"></a>
        <a href="index.php">Articles</a>
        <a href="about.html">A propos</a>
        <a href="contact.html">Contact</a>
        <a class="active" href="ConnectionUser.php">Connection</a>
    
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

    <section class="article-container contact-container">
        <h3>INSCRIPTION</h3>

        <form class="inscription-input-container" action="InscriptionUser.php" name="formUser" method="post">
            <div>
                <label for="">Pseudonyme</label>
                <input  class="connexion-input" type="text" name="Login" placeholder="max 25 char ." maxlength="25" id="" >
            </div>

            <div>
                <label for="">Mot de Passe</label>
                <input class="connexion-input" type="text" name="Pass" placeholder="max 25 char ." maxlength="25" id="" >
            </div>
            <div>
                <label for="">Nom</label>
                <input class="connexion-input" type="text" name="LastName" maxlength="25" id="" >
            </div>

            <div>
                <label for="">Prénom</label>
                <input class="connexion-input" type="text" name="FirstName" maxlength="25" id="" >
            </div>

            <div>
                <label for="">Adresse Mail</label>
                <input class="connexion-input" type="mail" name="EMail" id="" >
            </div>

            <div class="last-inscription-div">
                <input class="send-button send-button-inscription" type="submit" name="Submit" value="S'inscrire">
            </div>
            <p>Vous possédez déjà un compte ?<a href="ConnectionUser.php"> Connectez-vous</a></p>
        </form>
        <a href="index.php">Retour</a>
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
