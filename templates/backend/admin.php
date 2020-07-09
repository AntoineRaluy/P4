<?php ob_start(); ?>
<?php $title = "Administration" ?>

<h2>Articles</h2>
<p><a href="index.php?action=addPost">Nouvel article</a></p>

<table>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php foreach($chapters as $chapter): ?>
        <tr>
            <td><?= htmlspecialchars($chapter->getId())?></td>
            <td><a href="index.php?action=post&chapterId=<?= htmlspecialchars($chapter->getId());?>"><?= htmlspecialchars($chapter->getTitle());?></a></td>
            <td><?= substr(htmlspecialchars($chapter->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($chapter->getCreationDate());?></td>
            <td>
                <a href="index.php?action=editChapter&chapterId=<?= $chapter->getId(); ?>">Modifier</a>
                <a href="index.php?action=deleteChapter&chapterId=<?= $chapter->getId(); ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Commentaires signalés</h2>
<table>
    <tr>
        <td>Id</td>
        <td>Auteur</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php foreach($comments as $comment): ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getAuthor());?></td>
            <td><?= substr(htmlspecialchars($comment->getComment()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCommentDate());?></td>
            <td>
                <a href="index.php?action=checkComment&amp;commentId=<?= $comment->getId() ?>">Appouver le commentaire</a>
                <a href="index.php?action=deleteComment&amp;commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/frontend/template.php'; ?>