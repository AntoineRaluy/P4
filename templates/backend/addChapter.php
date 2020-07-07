<?php ob_start(); ?>
<?php $title = "Nouveau Chapitre" ?>
<h1>Nouveau Chapitre</h1>
<div>
    <form method="post" action="index.php?action=addPost">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"></textarea><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="index.php">Retour à l'accueil</a>
</div>

<script src="node_modules\tinymce\tinymce.min.js"></script>
<script>
    tinymce.init({
        selector : "textarea#content",
        language: "fr_FR",
    });
</script>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/frontend/template.php'; ?>