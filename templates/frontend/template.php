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
        <p><a href="/controller/backend.php">Connexion</a></p>

        <a href="index.php?action=addPost">Nouvel article</a>
        
        <?= $content ?>
    </div>
    </body>
</html>