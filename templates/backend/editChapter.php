<?php ob_start(); ?>
<?php $title = "Modifier le chapitre" ?>

<div class="row jumbotron editchapter shadow-sm">
    <div class="col">
        <form method="post" action="index.php?action=editPost&amp;chapterId=<?= $chapter->getId() ?>">
            <div class="form-group">  
                <label for="title">Titre</label><br>
                <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($chapter->getTitle()) ?>"><br>
            </div>  
            <div class="form-group"> 
                <label for="content">Texte</label><br>
                <textarea id="content" name="content" class="form-control" rows="15"><?= ($chapter->getContent())?></textarea><br>
            </div> 
                <input type="submit" value="Mettre à jour" id="submit" name="submit" class="btn btn-primary">
            
        </form>
    </div>
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