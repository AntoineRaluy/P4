<?php ob_start(); ?>
<?php $title = "Administration" ?>

<div class="row chapterAdmin mb-5">
    <div class="col">
        <h2>Articles</h2>
        <div class="table-responsive">
            <table class="table table-striped mt-3">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($chapters as $chapter): ?>
                    <tr>
                        <td class="align-middle"><a href="index.php?action=post&chapterId=<?= $chapter->getId();?>"><?= htmlspecialchars($chapter->getTitle());?></a></td>
                        <td class="align-middle"><?= substr(($chapter->getContent()), 0, 150);?>...</td>
                        <td class="align-middle"><?= htmlspecialchars(strftime("%d/%m/%Y", strtotime($chapter->getCreationDate())));?></td>
                        <td class="text-center align-middle">
                            <a href="index.php?action=editPost&chapterId=<?= $chapter->getId(); ?>"><i class="fas fa-pencil-alt mr-3"></i></a>
                            <a href="index.php?action=deletePost&chapterId=<?= $chapter->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col">
        <h2>Commentaires signalés</h2>
        <div class="table-responsive">
            <table class="table table-striped mt-3">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Auteur</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($comments as $comment): ?>
                    <tr>
                        <td class="align-middle"><?= htmlspecialchars($comment->getAuthor());?></td>
                        <td class="align-middle"><a href="index.php?action=post&chapterId=<?= $comment->getChapterId();?>"><?= substr(($comment->getComment()), 0, 150);?></a></td>
                        <td class="text-center align-middle"><?= htmlspecialchars($comment->getCommentDate());?></td>
                        <td class="text-center align-middle">
                            <a href="index.php?action=checkComment&amp;commentId=<?= $comment->getId() ?>"><i class="fas fa-check mr-3"></i></a>
                            <a href="index.php?action=deleteComment&amp;commentId=<?= $comment->getId(); ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/frontend/template.php'; ?>