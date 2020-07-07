<?php

namespace App\src\controller;

class ErrorController extends Controller
{
    public function errorNotFound()
    {
        echo 'Erreur : 1 ';
        // throw new Exception('Page inconnue.');
    }

    public function errorEmpty()
    {
        echo 'Erreur : 2 ';
        // throw new Exception('Tous les champs ne sont pas remplis !');
    }

    public function errorServer($e)
    {
        // echo 'Erreur : 3 ';
        
        echo $e->getMessage();
        
    }
}