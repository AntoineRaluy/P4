<?php

require 'model/postManager.php';

function listPost()
{   
    $postManager = new postManager();
    $posts = $postManager->getPosts(); 
    require ('view/frontend/listPostsView.php');
}