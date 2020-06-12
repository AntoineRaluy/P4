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

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php foreach($comments as $comment): ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <?php if($comment['flag'] === '1'):?>
        <p><em>Ce commentaire a déjà été signalé.</em></p>
        <?php else: ?>
        <p><em><a href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>&amp;idPost=<?= $_GET['id'] ?>">Signaler ce commentaire</a></em></p>
        <?php endif;?>
    
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
  
<?php require 'template.php'; ?>