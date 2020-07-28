<?php ob_start(); ?>
<?php $title = $chapter->getTitle() ?>

    <div class="row">
        <div class="col mt-5">
            <article>
                <div class="chapter">
                    <h2 class="text-center display-4 font-weight-normal text-uppercase"> <?= htmlspecialchars($chapter->getTitle()) ?> </h2>
                    <br><br>
                    <p> <?= nl2br($chapter->getContent()) ?> </p>
                    <br>
                    <p class="text-right"><em>Publié le : <?= strftime("%d %B %Y", strtotime($chapter->getCreationDate())) ?></em></p>
                </div>
            </article>
        </div>
    </div>
<hr>

<div class="row mt-3">
    <div class="col">
        <h3>Commentaires</h3>

        <form class="w-50 mx-auto mt-4" action="index.php?action=addComment&amp;chapterId=<?= $chapter->getId() ?>" method="post">
            <div class="form-group">
                <input type="text" id="author" name="author" class="form-control" placeholder="Nom" required>
            </div>
            <div class="form-group">  
                <textarea id="comment" name="comment" class="form-control" placeholder="Commentaire" required></textarea>
            </div>
            <div class="col text-center">
                <input type="submit" class="btn btn-primary w-25" value="Poster">
            </div>
        </form>

            <?php foreach($comments as $comment): ?>
                    <div class="row jumbotron mt-5 w-75 mx-auto commentcard">
                        <div class="col-8">
                            <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong></p>
                            <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
                            <p><small><?= $comment->getCommentDate() ?></small></p>
                        </div>  
                        <div class="col-4">
                            <?php if($comment->getFlag() === 1):?>
                                <div class="reportedComment">
                                    <p class="text-center text-danger"><i class="fas fa-exclamation-circle"></i></p>
                                    <p class="text-danger"><em>Ce commentaire a fait l'objet d'un signalement.</em></p>
                                </div>
                            <?php else: ?>
                                <p><a class="btn reportComment" data-toggle="collapse" href="#reportComment<?= $comment->getId() ?>" role="button" aria-expanded="false" aria-controls="reportComment"><i class="fas fa-chevron-down"></i></a></p>
                                <div class="collapse" id="reportComment<?= $comment->getId() ?>">
                                    <p><em><a href="index.php?action=reportComment&amp;commentId=<?= $comment->getId() ?>&amp;chapterId=<?= $chapter->getId() ?>">Signaler ce commentaire</a></em></p>
                                </div> 
                            <?php endif;?>
                        </div>
                    </div>
            <?php endforeach; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
  
<?php require 'template.php'; ?>