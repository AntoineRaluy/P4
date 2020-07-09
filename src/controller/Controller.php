<?php

namespace App\src\controller;

use App\src\DAO\ChapterDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;
use Exception;

abstract class Controller
{
    protected $chapterDAO;
    protected $commentDAO;
    protected $userDAO;

    public function __construct()
    {
        $this->chapterDAO = new ChapterDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
    }
    
}