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
        <a href="contact.php?EMail=<?=$EMail?>">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

	<section class="mentions">
		<h1>Mentions légales</h1>
		<h2>En vigueur au 23/03/2020</h2>
		<p>Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans
		l’économie numérique, dite L.C.E.N., il est porté à la connaissance des Utilisateurs du site https://GaveBleu.fr les
		présentes mentions légales.</p>
		<p>La connexion et la navigation sur le site (indiquer le nom du site) par l’Utilisateur implique acceptation intégrale et sans
		réserve des présentes mentions légales.</p>
		<p>Ces dernières sont accessibles sur le site à la rubrique « Mentions légales ».</p>

		<h3>ARTICLE 1 : L’éditeur</h3>
		<p>L’édition et la direction de la publication du site https://GaveBleu.fr est assurée par GaveTeam, domiciliée 1 Rue
		Jacques Ellul 33000, France, dont le numéro de téléphone est 0695021057, et l'adresse e-mail
		Gave.Team@gmail.com.</p>

		<h3>ARTICLE 2 : L’hébergeur</h3>
		<p>L'hébergeur du site https://GaveBleu.fr est la Société OVH, dont le siège social est situé au 2 rue Kellermann 59100
		Roubaix France , avec le numéro de téléphone : +33 9 72 10 10 07.</p>

		<h3>ARTICLE 3 : Accès au site</h3>
		<p>Le site est accessible par tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption programmée ou non et
		pouvant découlant d’une nécessité de maintenance.</p>
		<p>En cas de modification, interruption ou suspension des services le site https://GaveBleu.fr ne saurait être tenu
		responsable.</p>

		<h3>ARTICLE 4 : Collecte des données</h3>
		<p>Le site est exempté de déclaration à la Commission Nationale Informatique et Libertés (CNIL) dans la mesure où il ne
		collecte aucune donnée concernant les utilisateurs.</p>

		<h3>ARTICLE 5 : Cookies</h3>
		<p>L’Utilisateur est informé que lors de ses visites sur le site, un cookie peut s’installer automatiquement sur son logiciel de
		navigation.</p>
		<p>En naviguant sur le site, il les accepte.</p>
		<p>Un cookie est un élément qui ne permet pas d’identifier l’Utilisateur mais sert à enregistrer des informations relatives à
		la navigation de celui-ci sur le site Internet. L’Utilisateur pourra désactiver ce cookie par l’intermédiaire des paramètres
		figurant au sein de son logiciel de navigation.</p>

		<h3>ARTICLE 6 : Propriété intellectuelle</h3>
		<p>Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du site https://GaveBleu.fr,
		sans autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites judiciaires telles que
		notamment prévues par le Code de la propriété intellectuelle et le Code civil.</p>
		<p>Pour plus d’informations, se reporter aux CGU du site https://GaveBleu.fr accessible à la rubrique« CGU »</p>




	<footer class="contact-footer">
		<div class="footer-link-admin">
            <a href="mdp.php"><img class="logo-footer" src="img/logo.png"></a>
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
        <a href="contact.php">Contact</a>
        <a href="ConnectionUser.php">Connexion</a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

	<section class="mentions">
		<h1>Mentions légales</h1>
		<h2>En vigueur au 23/03/2020</h2>
		<p>Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans
		l’économie numérique, dite L.C.E.N., il est porté à la connaissance des Utilisateurs du site https://GaveBleu.fr les
		présentes mentions légales.</p>
		<p>La connexion et la navigation sur le site (indiquer le nom du site) par l’Utilisateur implique acceptation intégrale et sans
		réserve des présentes mentions légales.</p>
		<p>Ces dernières sont accessibles sur le site à la rubrique « Mentions légales ».</p>

		<h3>ARTICLE 1 : L’éditeur</h3>
		<p>L’édition et la direction de la publication du site https://GaveBleu.fr est assurée par GaveTeam, domiciliée 1 Rue
		Jacques Ellul 33000, France, dont le numéro de téléphone est 0695021057, et l'adresse e-mail
		Gave.Team@gmail.com.</p>

		<h3>ARTICLE 2 : L’hébergeur</h3>
		<p>L'hébergeur du site https://GaveBleu.fr est la Société OVH, dont le siège social est situé au 2 rue Kellermann 59100
		Roubaix France , avec le numéro de téléphone : +33 9 72 10 10 07.</p>

		<h3>ARTICLE 3 : Accès au site</h3>
		<p>Le site est accessible par tout endroit, 7j/7, 24h/24 sauf cas de force majeure, interruption programmée ou non et
		pouvant découlant d’une nécessité de maintenance.</p>
		<p>En cas de modification, interruption ou suspension des services le site https://GaveBleu.fr ne saurait être tenu
		responsable.</p>

		<h3>ARTICLE 4 : Collecte des données</h3>
		<p>Le site est exempté de déclaration à la Commission Nationale Informatique et Libertés (CNIL) dans la mesure où il ne
		collecte aucune donnée concernant les utilisateurs.</p>

		<h3>ARTICLE 5 : Cookies</h3>
		<p>L’Utilisateur est informé que lors de ses visites sur le site, un cookie peut s’installer automatiquement sur son logiciel de
		navigation.</p>
		<p>En naviguant sur le site, il les accepte.</p>
		<p>Un cookie est un élément qui ne permet pas d’identifier l’Utilisateur mais sert à enregistrer des informations relatives à
		la navigation de celui-ci sur le site Internet. L’Utilisateur pourra désactiver ce cookie par l’intermédiaire des paramètres
		figurant au sein de son logiciel de navigation.</p>

		<h3>ARTICLE 6 : Propriété intellectuelle</h3>
		<p>Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie du site https://GaveBleu.fr,
		sans autorisation de l’Editeur est prohibée et pourra entraînée des actions et poursuites judiciaires telles que
		notamment prévues par le Code de la propriété intellectuelle et le Code civil.</p>
		<p>Pour plus d’informations, se reporter aux CGU du site https://GaveBleu.fr accessible à la rubrique« CGU »</p>




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

