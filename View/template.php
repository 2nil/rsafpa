<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $webRoot ?>" >
        <link rel="stylesheet" href="../rsafpa/Theme/style.css" />
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="global">
            <div id="header">
                <a href="https://www.afpa.fr/"><img src="media/images/afpa_logo.jpg" alt="Afpa Logo"/></a>
                <a href="index.php"><div><h2>Home</h2></div></a>
                <a href=""><div><h2>Réserver salle</h2></div></a>
                <a href=""><div><h2>Modification</h2></div></a>
                <a href="index.php"><h1 id="titreApp">Gestion des salles AFPA</h1></a>
            </div>
            <div id="content" class="focusW">
                <?= $content ?>
            </div>
            <div id="footer">
            <p>Réalisé avec PHP7, SQL, HTML5, CSS et Javascript.</p>
            </div>
        </div>
    </body>
</html>