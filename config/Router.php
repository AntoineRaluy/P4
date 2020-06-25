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
                if ($_GET['action'] == 'listPosts') {
                    $this->frontController->listChapters();
                }
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0) {
                        $this->frontController->chapter($_GET['chapterId']);
                    }
                    else {
                        $this->errorController->errorNotFound();
                        // throw new Exception('Page inconnue');
                    }
                }
                elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['chapterId']) && $_GET['chapterId'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            addComment($_GET['chapterId'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            $this->errorController->errorEmpty();
                            // throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else {
                        $this->errorController->errorNotFound();
                        // throw new Exception('Page inconnue');
                    }
                }
                elseif ($_GET['action'] == 'reportComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        flagComment($_GET['id'], $_GET['idPost']);
                    }
                    else {
                        $this->errorController->errorNotFound();
                        // throw new Exception('Aucun identifiant de commentaire envoyé');
                    }
                }
                elseif ($_GET['action'] == 'addPost') {
                    $this->backController->addChapter($_POST);
                }
            }
            else {
                $this->frontController->listChapters();
            }
        }
        
        catch(Exception $e) { 
            $this->errorController->errorServer();
            // echo 'Erreur : ' . $e->getMessage();
        }
    }
}