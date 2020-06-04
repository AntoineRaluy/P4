<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Jean Forteroche</h1>

<?php foreach($posts as $post): ?>
    <h2><?= $post['title'] ?> </h2>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>