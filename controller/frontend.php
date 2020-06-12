<?php

require_once 'model/postManager.php';
require_once 'model/commentManager.php';

function listPosts()
{   
    $postManager = new postManager();
    $posts = $postManager->getPosts(); 
    require 'view/frontend/listPostsView.php';
}

function post()
{
    $postManager = new postManager();
    $commentManager = new commentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require 'view/frontend/postView.php';
}

function addComment($postId, $author, $comment)
{
    $commentManager = new commentManager();
    $newComment = $commentManager->postComment($postId, $author, $comment);

    if ($newComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function flagComment($commentId, $postId)
{
    $commentManager = new commentManager();
    $reportedComment = $commentManager->reportComment($commentId);

    header('Location: index.php?action=post&id='.$postId);
}
