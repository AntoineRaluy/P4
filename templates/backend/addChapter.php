<?php $this->title = "Nouveau Chapitre" ?>
<h1>Nouveau Chapitre</h1>

<?php ob_start(); ?>
<div>
    <form method="post" action="index.php?action=addPost">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"></textarea><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author"><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/frontend/template.php'; ?>