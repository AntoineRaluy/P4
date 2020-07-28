<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <meta name="description"
        content="Billet simple pour l'Alaska. Découvrez le nouveau livre en ligne de Jean Forteroche.">
        <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link href="public/css/style.css" rel="stylesheet"> 
    </head>
        
    <body>
    <div class="bg-info navmenu">
        <div class="container">
            <div class="row">
                <nav class="col navbar navbar-expand-md navbar-dark">
                    <a class="navbar-brand mr-5" href="index.php"><h1>J. Forteroche</h1></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbarContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-5">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Accueil</a>
                            </li>
                        <?php if(isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=addPost">Nouveau chapitre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=admin">Panneau d'administration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=updatePassword">Modifier le mot de passe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
                            </li>        

                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=login">Connexion</a>
                            </li> 
                        <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <?php if((basename($_SERVER['PHP_SELF']) == "index.php") && !isset($_GET['action'])): ?>
        <div class="hero-image">
            <div class="hero-text">
                <h1 class="font-italic font-weight-normal display-3">Billet simple pour l'Alaska</h1>
                <p>Le nouveau livre de <span class="font-weight-normal">Jean Forteroche</span>, auteur du best-seller <span class="font-italic">L'Équateur en un aller-retour</span>.</p>
            </div>
        </div>
    <?php endif; ?>


    <div class="container mt-5 mb-5">
        <?= $content ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cookie.eurowebpage.com/cookie.js?skin=cookielaw3&amp;box_radius=4&amp;position=bottom_right&amp;delay=1&amp;bg_color=22a9e6&amp;msg_color=ffffff&amp;link_color=0c0c0c&amp;accept_background=ffffff&amp;accept_color=295285&amp;accept_radius=3"></script>
                        
    </body>

    <footer class="bg-info footmenu">
        <p class="text-center pt-1"><a class="policies text-white" href="index.php?action=policies">Mentions légales</a> <a class="cookies pl-3 pr-3 text-white" href="index.php?action=cookies">Politique de confidentialité</a> <a class="text-white " href="mailto:antoine.raluy@hotmail.fr">Contact</a></p>
    </footer>
</html>