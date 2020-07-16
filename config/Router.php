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
                    case 'checkComment':
                        $this->backController->checkComment($_GET['commentId'], $_GET['chapterId']);
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
                    case 'login':
                        $this->frontController->login($_POST);                  
                        break;
                    case 'updatePassword':
                        $this->backController->updatePassword($_POST);
                        break;
                    case 'logout':
                        $this->backController->logout();
                        break;
                    case 'admin':
                        $this->backController->admin();
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
    }
}