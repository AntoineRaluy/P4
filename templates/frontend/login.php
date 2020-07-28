<?php ob_start(); ?>

<?php $title = "Connexion" ?>

<div class="row">
    <div class="col login-form">
            <form method="post" class="border border-primary rounded p-4 w-50 jumbotron mx-auto" action="index.php?action=login">
                <label for="username">Identifiant</label><br>
                <input type="text" id="username" name="username" class="form-control"><br>
                <label for="password">Mot de passe</label><br>
                <input type="password" id="password" name="password" class="form-control"><br>
                <div class="col text-center">
                    <input type="submit" value="Connexion" id="submit" name="submit" class="btn btn-primary">
                </div>
            </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>