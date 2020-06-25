<?php

namespace App\src\controller;

class FrontController extends Controller
{
    public function listChapters()
    {   
        $chapters = $this->chapterDAO->getChapters(); 
        require 'templates/frontend/listPostsView.php';
    }

    public function chapter($chapterId)
    {
        $chapter = $this->chapterDAO->getChapter($_GET['chapterId']);   
        $comments = $this->commentDAO->getComments($_GET['chapterId']);    
        require 'templates/frontend/postView.php';
    }
}


// function comment()
// {
//     $comment = new Comment();
//     $comments = $comment->getComments($_GET['chapterId']);
//     require 'view/frontend/postView.php';  
// }

function addComment($postId, $author, $comment)
{
    $comment = new Comment();
    $comments = $Comment->postComment($postId, $author, $comment);

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
