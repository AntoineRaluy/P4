<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Jean Forteroche</h1>

<?php foreach($chapters as $chapter): ?>
    <h2><?= $chapter->getTitle() ?> </h2>
    <p><?= $chapter->getContent() ?>
    <br>
    <em>le <?= $chapter->getCreationDate() ?></em>
    <br><br>
    <em><a href="index.php?action=post&amp;chapterId=<?= $chapter->getId() ?>">Commentaires</a></em></p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>