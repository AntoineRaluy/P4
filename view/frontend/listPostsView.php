<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Jean Forteroche</h1>

<?php foreach($posts as $post): ?>
    <h2><?= $post['title'] ?> </h2>
    <p><?= $post['content'] ?>
    <br>
    <em>le <?= $post['creationDate'] ?></em>
    <br><br>
    <em><a href="index.php?action=post&amp;id=<?= $post['id'] ?>">Commentaires</a></em></p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>