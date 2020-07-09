<?php

namespace App\src\controller;

class FrontController extends Controller
{
    public function listChapters()
    {   
        $chapters = $this->chapterDAO->getChapters(); 
        require 'templates/frontend/listPostsView.php';
    }

    public function chapter(int $chapterId)
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

    public function login($post)
    {
        if(isset($post['submit'])) {
            $result = $this->userDAO->login($_POST['password']);

            if($result && $result['passwordOk']) {
                $_SESSION['username'] = $_POST['username'];
                header('Location: index.php');
            }
            else {
                echo 'Le pseudo ou le mot de passe sont incorrects.';
                require 'templates/frontend/login.php';   
            }
        }
        require 'templates/frontend/login.php';
    }
}
