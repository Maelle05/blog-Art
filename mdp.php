<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Page protégée par un mot de passe</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav class="admin-page">
            <div class="admin-container">
                <p>Veuillez entrer le mot de passe pour avoir accès à l'administration .</p>
                <form class="admin-form" action="admin.php" method="post">
                    <input class="admin-password" placeholder="Mot de passe" type="password" maxlength="15" name="mot_de_passe" />
                    <input class="admin-btn" type="submit" name="mdp" value="Valider" />
                </form>
            </div>
        </section>
    </body>
</html>
