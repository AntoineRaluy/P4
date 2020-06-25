<?php $title = $chapter->getTitle(); ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des articles</a></p>

<div class="chapter">
    <h3> <?= htmlspecialchars($chapter->getTitle()) ?>
        <em>le <?= $chapter->getCreationDate() ?></em>
    </h3>
    <p> <?= nl2br(htmlspecialchars($chapter->getContent())) ?> </p>
</div>

<h2>Commentaires :</h2>

<form action="index.php?action=addComment&amp;chapterId=<?= $chapter->getId() ?>" method="post">
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
    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?></p>
    <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>

    <?php if($comment->getFlag() === '1'):?>
        <p><em>Ce commentaire a déjà été signalé.</em></p>
        <?php else: ?>
        <p><em><a href="index.php?action=reportComment&amp;id=<?= $comment->getId() ?>&amp;idPost=<?= $_GET['chapterId'] ?>">Signaler ce commentaire</a></em></p>
        <?php endif;?>
    
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
  
<?php require 'template.php'; ?>