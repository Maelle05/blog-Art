<?php 
session_start();

include 'conect.php';
$userInfo =0;

if(isset($_GET['EMail'])){

    $EMail = htmlspecialchars($_GET['EMail']);
    $reqUser = $bdPdo->prepare("SELECT * FROM USER WHERE EMAIL = ?");
    $reqUser->execute(array($EMail));
	$userInfo = $reqUser->fetch();
	
}
?>
<?php
if(isset($_SESSION['EMail']) AND $userInfo['EMail'] == $_SESSION['EMail']){
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>BlogArt</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
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
        	<a class="menu-container-link" href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
        </div>      
    </section>

    <section class="nav-bar">
        <a class="no-display" href="profil.php?EMail=<?=$EMail?>"><img class="logo-header" src="img/logo.png"></a>
        <a href="profil.php?EMail=<?=$EMail?>">Articles</a>
        <a href="about.php?EMail=<?=$EMail?>">A propos</a>
        <a class="active" href="contact.php?EMail=<?=$EMail?>">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

	<section class="article-container contact-container">
		<h3>CONTACT</h3>

		<p class="chapo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris… </p>

		<div class="contact-input-container">
			<input class="contact-input" type="mail" placeholder="Adresse mail…" name="mail">
			<input class="contact-input" type="text" placeholder="Objet…" name="">
			<textarea placeholder="Écrire un message…"></textarea>
			<button class="send-button">Envoyer</button>

			<div class="logo-contact-container">
			<div>
				<a href=""><img src="img/black-fb.png">
				<p>Gavé Bleu</p></a>
			</div>
			<div>
				<a href=""><img src="img/black-insta.png">
				<p>gavebleu</p></a>
			</div>
		</div>
		</div>

		

		
	</section>



	<footer class="contact-footer">
		<div class="footer-link-admin">
            <a href="#"><img class="logo-footer" src="img/logo.png"></a>
            <a class="admin-link" href="mdp.php">Partie administration</a>
        </div>
		<a href="mentions.php?EMail=<?=$EMail?>">MENTIONS LEGALES</a>
        <a href="#">COOKIES</a>
        <a href="moderation.php?EMail=<?=$EMail?>">CHARTE DE MODERATION</a>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php }else{ ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>BlogArt</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
		
	<div class="icon">
		<div class="hamburger hamburger-middle"></div>
	</div>

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
        <a class="active" href="contact.php">Contact</a>
        <a href="ConnectionUser.php">Connexion</a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

	<section class="article-container contact-container">
		<h3>CONTACT</h3>

		<p class="chapo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris… </p>

		<div class="contact-input-container">
			<input class="contact-input" type="mail" placeholder="Adresse mail…" name="mail">
			<input class="contact-input" type="text" placeholder="Objet…" name="">
			<textarea placeholder="Écrire un message…"></textarea>
			<button class="send-button">Envoyer</button>

			<div class="logo-contact-container">
			<div>
				<a href=""><img src="img/black-fb.png">
				<p>Gavé Bleu</p></a>
			</div>
			<div>
				<a href=""><img src="img/black-insta.png">
				<p>gavebleu</p></a>
			</div>
		</div>
		</div>

		

		
	</section>



	<footer class="contact-footer">
		<div class="footer-link-admin">
            <a href="mdp.php"><img class="logo-footer" src="img/logo.png"></a>
            <a class="admin-link" href="mdp.php">Partie administration</a>
        </div>
		<a href="mentions.php">MENTIONS LEGALES</a>
        <a href="#">COOKIES</a>
        <a href="moderation.php">CHARTE DE MODERATION</a>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php } ?>