<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Page protégée par mot de passe</title>
    </head>
    <body>
        <div class="center">
            <p>Veuillez entrer le mot de passe pour obtenir l'accès à l'administration .</p>
            <form action="admin.php" method="post">
                <p>
                <input type="password" name="mot_de_passe" />
                <input type="submit" name="mdp" value="Valider" />
                </p>
            </form>
            <a href="index.php">Retour</a>
        </div>
    </body>
</html>