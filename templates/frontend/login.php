<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<div>
    <form method="post" action="index.php?action=login">
        <label for="username">Login</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    
    <a href="index.php">Retour à l'accueil</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>