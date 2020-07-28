<?php $title = "Jean Forteroche" ?>

<?php ob_start(); ?>

<div class="row">
<?php foreach($chapters as $chapter): ?>
    <div class="col-4">
        <div class="card m-2 shadow-sm">
                <article class="p-3">
                    <h2 class="card-title font-weight-normal"><a href="index.php?action=post&amp;chapterId=<?= $chapter->getId() ?>" class="stretched-link"><?= $chapter->getTitle() ?></a> </h2>
                    <em>Publié le : <?= strftime("%d %B %Y", strtotime($chapter->getCreationDate())) ?></em>
                    <br><br>
                    <p class="card-text"><?= substr(($chapter->getContent()), 0, 250) ?>...</p>
                    <br>
                </article>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>