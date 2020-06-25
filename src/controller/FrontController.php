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
        $chapter = $this->chapterDAO->getChapter($chapterId);   
        $comments = $this->commentDAO->getComments($chapterId);    
        require 'templates/frontend/postView.php';
    }

    public function addComment($chapterId, $author, $comment)
    {
        $this->commentDAO->postComment($chapterId, $author, $comment);
        header('Location: index.php?action=post&chapterId=' . $chapterId);
    }

    public function flagComment($commentId, $chapterId)
    {
        $this->commentDAO->reportComment($commentId);
        header('Location: index.php?action=post&chapterId='. $chapterId);
    }
}
