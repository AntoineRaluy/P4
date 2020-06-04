<?php $title = $post['title']; ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des articles</a></p>

<div class="chapter">
    <h3> <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creationDate'] ?></em>
    </h3>
    <p> <?= nl2br(htmlspecialchars($post['content'])) ?> </p>
</div>

<h2>Commentaires :</h2>

<?php foreach($comments as $comment): ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
  
<?php require 'template.php'; ?>