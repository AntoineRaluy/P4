<?php ob_start(); ?>
<div>
    <form method="post" action="index.php?action=editPost&amp;chapterId=<?= $chapter->getId() ?>">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($chapter->getTitle()) ?>"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?= nl2br(($chapter->getContent())) ?></textarea><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
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