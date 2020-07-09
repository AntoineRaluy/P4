<?php

namespace App\src\controller;

class BackController extends Controller
{   
    private function checkAdmin()
    {
        if(!isset($_SESSION['username'])) {
            echo 'Vous devez vous connecter pour accéder à cette page';
            header('Location: index.php?action=login');
        } else {
            return true;
        }
    }

    public function addChapter($post)
    {
        if($this->checkAdmin()) {
            if(isset($post['submit'])) {
                $chapter = $this->chapterDAO->addChapter($post);
                header('Location: index.php?action=admin');
            }
            require 'templates/backend/addChapter.php';
        }
    }

    public function editChapter($post, $chapterId)
    {   
        if($this->checkAdmin()) {
            $chapter = $this->chapterDAO->getChapter($chapterId);
            if(isset($post['submit'])) {
                $this->chapterDAO->editChapter($post, $chapterId);
                header('Location: index.php?action=admin');
            }
            require 'templates/backend/editChapter.php';
        }
    }

    public function deleteChapter($chapterId)
    {
        if($this->checkAdmin()) {
            $this->chapterDAO->deleteChapter($chapterId);
            header('Location: index.php?action=admin');
        }
    }

    public function checkComment($commentId)
    {
        if($this->checkAdmin()) {
            $this->commentDAO->checkComment($commentId);
            header('Location: index.php?action=admin');
        }
    }
    
    public function deleteComment($commentId)
    {   
        if($this->checkAdmin()) {
            $this->commentDAO->deleteComment($commentId);
            header('Location: index.php?action=admin');
        }
    }

    public function updatePassword($post)
    {
        if($this->checkAdmin()) {
            if(isset($post['submit'])) {
                $this->userDAO->updatePassword($post, $_SESSION['username']);
                header('Location: index.php');
            }
            require 'templates/backend/updatePassword.php';
        }
    }

    public function logout()
    {   
        if($this->checkAdmin()) {
            session_destroy();

            header('Location: index.php');
        }
    }

    public function admin() 
    {   
        if($this->checkAdmin()) {
            $chapters = $this->chapterDAO->getChapters();
            $comments = $this->commentDAO->getReportedComments();
            require 'templates/backend/admin.php';
            return [$chapters, $comments];
        }
    }
}