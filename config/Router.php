<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->backController = new BackController();
    }

    public function run()
    {
        try {
            if (isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'listPosts':
                        $this->frontController->listChapters();
                        break;
                    case 'post':
                        $this->frontController->chapter($_GET['chapterId']);
                        break;
                    case 'addComment':
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->frontController->addComment($_GET['chapterId'], $_POST['author'], $_POST['comment']);
                        }
                        break;
                    case 'reportComment':
                        $this->frontController->flagComment($_GET['commentId'], $_GET['chapterId']);
                        break;
                    case 'deleteComment':
                        $this->backController->deleteComment($_GET['commentId'], $_GET['chapterId']);
                        break;
                    case 'addPost':
                        $this->backController->addChapter($_POST);
                        break;
                    case 'editPost':
                        $this->backController->editChapter($_POST, $_GET['chapterId']);
                        break;
                    case 'deletePost':
                        $this->backController->deleteChapter($_GET['chapterId']);
                        break;
                    default:
                        $this->frontController->listChapters();
                }
            }
            else {
                $this->frontController->listChapters();
            }
        }
        
        catch(Exception $e) { 
            $this->errorController->errorServer($e);
        }


        //     if (isset($_GET['action'])) {
        //         if ($_GET['action'] == 'listPosts') {
        //             $this->frontController->listChapters();
        //         }
        //         elseif ($_GET['action'] == 'post') {
        //             if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0) {
        //                 $this->frontController->chapter($_GET['chapterId']);
        //             }
        //             else {
        //                 $this->errorController->errorNotFound();
        //                 // throw new Exception('Page inconnue');
        //             }
        //         }
        //         elseif ($_GET['action'] == 'addComment') {
        //             if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0) {
        //                 if (!empty($_POST['author']) && !empty($_POST['comment'])) {
        //                     $this->frontController->addComment($_GET['chapterId'], $_POST['author'], $_POST['comment']);
        //                 }
        //                 else {
        //                     $this->errorController->errorEmpty();
        //                     // throw new Exception('Tous les champs ne sont pas remplis !');
        //                 }
        //             }
        //             else {
        //                 $this->errorController->errorNotFound();
        //                 // throw new Exception('Page inconnue');
        //             }
        //         }
        //         elseif ($_GET['action'] === 'reportComment') {
        //             echo 'test';
        //             $this->frontController->flagComment($_GET['commentId'], $_GET['chapterId']);
        //             // if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
        //             //     $this->frontController->flagComment($_GET['commentId'], $_GET['chapterId']);
        //             // }
        //             // else {
        //             //     $this->errorController->errorNotFound();
        //             //     // throw new Exception('Aucun identifiant de commentaire envoyé');
        //             // }
        //         }
        //         elseif ($_GET['action'] === 'deleteComment') {
        //             if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
        //                 $this->backController->deleteComment($_GET['commentId'], $_GET['chapterId']);
        //             }
        //             else {
        //                 $this->errorController->errorNotFound();
        //                 // throw new Exception('Aucun identifiant de commentaire envoyé');
        //             }
        //         }
        //         elseif ($_GET['action'] == 'addPost') {
        //             $this->backController->addChapter($_POST);
        //         }
        //         elseif ($_GET['action'] == 'editPost') {
        //             $this->backController->editChapter($_GET['chapterId']);
        //         }
        //     }
        //     else {
        //         $this->frontController->listChapters();
        //     }
        // }
        
        // catch(Exception $e) { 
        //     $this->errorController->errorServer();
        //     // echo 'Erreur : ' . $e->getMessage();
        // }
    }
}