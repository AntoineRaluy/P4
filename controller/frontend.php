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
