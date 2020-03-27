<?php 
session_start();

include 'conect.php';

if(isset($_SESSION['EMail']) OR $_GET['EMail']){
    if(isset($_SESSION['EMail']))
    {
        $infoUser = $_SESSION['EMail']; 

    }else{
            $infoUser = $_GET['EMail'];
    }
    
    $User = $bdPdo->prepare('SELECT * FROM user WHERE EMail ="'.$infoUser.'"');
    $User->execute(
        array($infoUser)
    );

    if($User->rowCount() == 1){
        $User =$User->fetch();
        $Login = $User['Login'];
        $Pass = $User['Pass'];
        $FirstName = $User['FirstName'];
        $LastName = $User['LastName'];
        $EMail = $User['EMail'];
    }else{
        die('Ce User n\'existe pas !');
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $Submit = isset($_GET['Submit']) ? $_GET['Submit'] : '';


            if (((isset($_GET['Login'])) AND !empty($_GET['Login']))
            AND ((isset($_GET['Pass'])) AND !empty($_GET['Pass']))
            AND ((isset($_GET['LastName'])) AND !empty($_GET['LastName']))
            AND ((isset($_GET['FirstName'])) AND !empty($_GET['FirstName']))
            ) {
                $erreur = false;

                $Login = htmlspecialchars($_GET['Login']);
                $Pass = htmlspecialchars($_GET['Pass']);
                $LastName = htmlspecialchars($_GET['LastName']);
                $FirstName = htmlspecialchars($_GET['FirstName']);
                $EMail1 = $EMail;


                try{
                    //Début transaction
                    $bdPdo->beginTransaction();
                    // preparation de la requete Preparee dans une chane de caractere
                    // instruction incert Preparation
                    $query = $bdPdo->prepare('UPDATE user SET Login = :Login, Pass = :Pass, LastName = :LastName, FirstName = :FirstName WHERE  EMail = :EMail');
                    // Execution du prepare lancement
                    $query->execute(
                        array(
                            ':Login'=> $Login,
                            ':Pass'=> $Pass,
                            ':LastName'=> $LastName,
                            ':FirstName'=> $FirstName,
                            ':EMail'=> $EMail1
                        )
                    );

                    // commite de la transaction (confirm insert)
                    $bdPdo->commit();

                }catch( PDOException $e ){
                    //rollBack  (annule Insert)
                $bdPdo->rollBack();
                }
                ?> 
                    <?php

//liberer le curseur
$query->closeCursor();

// affichage des messsages d'erreur et/ou d'envoie

}
}

?>
                
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Profil User</title>
</head>
<body>
    <div class="icon">
		<div class="hamburger hamburger-middle"></div>
	</div>

	<section class="menu-container">
        <div class="link-container-menu">
            <a class="menu-container-link" href="profil.php?EMail=<?=$EMail?>">ACCUEIL</a>
            <a class="menu-container-link" href="profil.php?EMail=<?=$EMail?>">ARTICLES</a>
            <a class="menu-container-link" href="about.php?EMail=<?=$EMail?>">A PROPOS</a>
            <a class="menu-container-link" href="contact.php?EMail=<?=$EMail?>">CONTACT</a>
            <a class="menu-container-link" href="disconnectUser.php">Se déconnecter</a>
        	<a class="menu-container-link" href="editUserProfil.php"><?= $Login ?></a>
        </div>      
    </section>

    <section class="nav-bar">
        <a class="no-display" href="profil.php?EMail=<?=$EMail?>"><img class="logo-header" src="img/logo.png"></a>
        <a href="profil.php?EMail=<?=$EMail?>">Articles</a>
        <a href="about.php?EMail=<?=$EMail?>">A propos</a>
        <a href="contact.php?EMail=<?=$EMail?>">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a class="active" href="editUserProfil.php"><?= $Login ?></a>
    </section>
    
    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>
    <section class="article-container contact-container">
        <h3>Edition de mon Profil</h3>
        <p class="mail-change">Mail:<?= $EMail ?></p>
        <form class="connexion-input-container" action="editUserProfil.php" method="get">

            <label class="no-margin" for="">Login</label>
            <input type="hidden" name="id" value="<?= $Login ?>">

            <input class="connexion-input" type="text" name="Login" maxlength="25" id="" value="<?= $Login ?>" ><br>

            <label class="no-margin" for="">Password</label>
            <input class="connexion-input" type="password" name="Pass" maxlength="25" id="" value="<?= $Pass ?>" ><br>

            <label class="no-margin" for="">Nom</label>
            <input class="connexion-input" type="text" name="LastName" maxlength="25" id="" value="<?= $LastName ?>" ><br>

            <label class="no-margin" for="">Prénom</label>
            <input class="connexion-input" type="text" name="FirstName" maxlength="25" id="" value="<?= $FirstName ?>" ><br>

            <input class="send-button" type="submit" name="Submit" value="Validé">
        </form>
    </section>




    <footer class="contact-footer">
		<div class="footer-link-admin">
            <a href="mdp.php"><img class="logo-footer" src="img/logo.png"></a>
            <a class="admin-link" href="mdp.php">Partie administration</a>
        </div>
		<a href="#">MENTIONS LEGALES</a>
		<a href="#">COOKIES</a>
		<a href="#">CHARTE DE MODERATION</a>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

<?php }else{
    header("Location: index.php");
} ?>