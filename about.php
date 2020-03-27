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
        <a class="active" href="about.php?EMail=<?=$EMail?>">A propos</a>
        <a href="contact.php?EMail=<?=$EMail?>">Contact</a>
        <a href="disconnectUser.php">Se déconnecter</a>
        <a href="editUserProfil.php?EMail=<?=$EMail?>"><?= $userInfo['Login'] ?></a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

	<section class="article-container about-container">
		<h3>A PROPOS</h3>

		<p class="second-paragraphe">Nous sommes un groupe de six étudiants en DUT Métiers du Multimédia et de l’Internet. Nous nous sommes réunis autour d’un seul et même projet : un blog sur la belle ville de Bordeaux ! C’est comme ça que Gavé Bleu est naît ! 
		Il nous tenait à coeur de parler de notre capitale du Sud-Ouest au travers d’une thématique large afin d’exprimer au mieux nos différentes personnalités. Nous avons donc choisi la couleur bleu comme angle d’attaque. La Gavé team vous invite à lire, découvrir et apprécier nos articles pour en apprendre plus sur Bordeaux. Croyez le ou non, le Bleu est omniprésent ici et nous avons beaucoup de choses à partager avec vous ! 
		La Gavé Team vous souhaite donc une très bonne découverte de la ville colorée qu’est Bordeaux ! 
		</p>

		
	</section>



	<footer class="footer-about">
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
        <a class="active" href="about.php">A propos</a>
        <a href="contact.php">Contact</a>
        <a href="ConnectionUser.php">Connexion</a>
    </section>

    <section class="first-container">
        <div class="first-container-filter">
            <h1 class="slogan">Une visite <span class="coloree">colorée</span> de Bordeaux</h1>
        </div>
    </section>

	<section class="article-container about-container">
		<h3>A PROPOS</h3>

		<p class="second-paragraphe">Nous sommes un groupe de six étudiants en DUT Métiers du Multimédia et de l’Internet. Nous nous sommes réunis autour d’un seul et même projet : un blog sur la belle ville de Bordeaux ! C’est comme ça que Gavé Bleu est naît ! 
		Il nous tenait à coeur de parler de notre capitale du Sud-Ouest au travers d’une thématique large afin d’exprimer au mieux nos différentes personnalités. Nous avons donc choisi la couleur bleu comme angle d’attaque. La Gavé team vous invite à lire, découvrir et apprécier nos articles pour en apprendre plus sur Bordeaux. Croyez le ou non, le Bleu est omniprésent ici et nous avons beaucoup de choses à partager avec vous ! 
		La Gavé Team vous souhaite donc une très bonne découverte de la ville colorée qu’est Bordeaux ! 
		</p>

		
	</section>



	<footer class="footer-about">
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