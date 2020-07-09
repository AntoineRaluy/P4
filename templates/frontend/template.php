<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet"> 
    </head>
        
    <body>
    <div class="container">
        <?php
        if(isset($_SESSION['username'])) {
        ?>
        <p><a href="/index.php?action=updatePassword">Modifier le mot de passe</a>
        <p><a href="/index.php?action=logout">Déconnexion</a></p>
        <p><a href="index.php?action=addPost">Nouvel article</a></p>

        <?php 
        } else {
        ?>
        <p><a href="/index.php?action=login">Connexion</a></p>

        <?php
        }
        ?>        
        <?= $content ?>
    </div>
    </body>
</html>