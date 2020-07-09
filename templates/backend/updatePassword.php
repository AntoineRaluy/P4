<?php $this->title = "Modifier le mot de passe" ?>

<?php ob_start(); ?>
<div>
    <p>Le mot de passe de <?= $_SESSION['username'] ?> sera modifié</p>
    <form method="post" action="index.php?action=updatePassword">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>

<a href="index.php">Retour à l'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/frontend/template.php'; ?>