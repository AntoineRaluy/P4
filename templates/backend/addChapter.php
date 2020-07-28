<?php ob_start(); ?>
<?php $title = "Nouveau Chapitre" ?>

<div class="row jumbotron addchapter shadow-sm">
    <div class="col">
        <form method="post" action="index.php?action=addPost">
            <div class="form-group">  
                <label for="title">Titre</label><br>
                <input type="text" id="title" name="title" class="form-control"><br>
            </div>
            <div class="form-group">  
                <label for="content">Texte</label><br>
                <textarea id="content" name="content" class="form-control" rows="15"></textarea><br>
            </div>
            <input type="submit" value="Envoyer" id="submit" name="submit" class="btn btn-primary">
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