<?php ob_start(); ?>

<?php $title = "Modifier le mot de passe" ?>

<div class="row">
    <div class="col password-form">
        <form method="post" class="border border-primary rounded p-4 w-50 jumbotron mx-auto" action="index.php?action=updatePassword">
            <label for="password">Entrez le nouveau mot de passe pour <?= $_SESSION['username'] ?> :</label><br>
            <input type="password" id="new-password" name="password" class="form-control"><br>
            <label for="password">Confirmez le nouveau mot de passe :</label><br>
            <input type="password" id="confirm-password" name="password" class="form-control"><br>
            <div class="col text-center">
                <input type="submit" value="Mettre à jour" id="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script src="public/js/updatePassword.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/frontend/template.php'; ?>