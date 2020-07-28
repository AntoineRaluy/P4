<?php

namespace App\src\controller;

class ErrorController extends Controller
{
    public function error()
    {      
        echo "La page demandée n'existe pas.";  
    }
}