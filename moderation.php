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
		<h1>Charte de modération de Gavebleu.fr</h1>
		<h2>Règles à respecter dans le cadre des commentaires d’articles :</h2>
		<p>L’utilisateur souhaitant poster un commentaire sur un article se doit de respecter les règles suivantes :
		</p>
		<h3>Les messages contenant les éléments suivant se verront supprimés :</h3>
		<ul>
			<li>de la vulgarité,</li>
			<li>de l’agressivité,</li>
			<li>de la moquerie,</li>
			<li>des liens vers des sites externes,</li>
			<li>des annonces ou des messages à caractère publicitaire.</li>
		</ul>

		<h3>Sont également prohibés tous commentaires contenant :</h3>
		<ul>
			<li>des allusions sexistes, homophobes ou racistes,</li>
			<li>de la discrimination,</li>
			<li>de la pédophilie,</li>
			<li>de l’incitation à la haine,</li>
			<li>du proxénétisme,</li>
			<li>de la diffamation,</li>
			<li>des injures,</li>
			<li>de l’incitation à la consommation d’alcool ou de produit illicite,</li>
			<li>de l’incitation au meurtre.</li>
		</ul>

		<p>Nous nous réservons le droit de supprimer un commentaire si nous considérons qu’il ne respecte pas l’un des points cités ci-dessus.</p>
		<p>Nous ne sommes pas dans l’obligation de prévenir l’auteur du commentaire si celui-ci se voit supprimé.</p>
		<p>Les commentaires ne sont soumis à aucun droit d’auteur.</p>
		


	</section>



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
		<h1>Charte de modération de Gavebleu.fr</h1>
		<h2>Règles à respecter dans le cadre des commentaires d’articles :</h2>
		<p>L’utilisateur souhaitant poster un commentaire sur un article se doit de respecter les règles suivantes :
		</p>
		<h3>Les messages contenant les éléments suivant se verront supprimés :</h3>
		<ul>
			<li>de la vulgarité,</li>
			<li>de l’agressivité,</li>
			<li>de la moquerie,</li>
			<li>des liens vers des sites externes,</li>
			<li>des annonces ou des messages à caractère publicitaire.</li>
		</ul>

		<h3>Sont également prohibés tous commentaires contenant :</h3>
		<ul>
			<li>des allusions sexistes, homophobes ou racistes,</li>
			<li>de la discrimination,</li>
			<li>de la pédophilie,</li>
			<li>de l’incitation à la haine,</li>
			<li>du proxénétisme,</li>
			<li>de la diffamation,</li>
			<li>des injures,</li>
			<li>de l’incitation à la consommation d’alcool ou de produit illicite,</li>
			<li>de l’incitation au meurtre.</li>
		</ul>

		<p>Nous nous réservons le droit de supprimer un commentaire si nous considérons qu’il ne respecte pas l’un des points cités ci-dessus.</p>
		<p>Nous ne sommes pas dans l’obligation de prévenir l’auteur du commentaire si celui-ci se voit supprimé.</p>
		<p>Les commentaires ne sont soumis à aucun droit d’auteur.</p>
		


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