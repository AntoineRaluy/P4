<?php

namespace App\src\controller;

class ErrorController extends Controller
{
    public function errorNotFound()
    {
        echo 'Erreur : ';
        // throw new Exception('Page inconnue.');
    }

    public function errorEmpty()
    {
        echo 'Erreur : ';
        // throw new Exception('Tous les champs ne sont pas remplis !');
    }

    public function errorServer()
    {
        echo 'Erreur : ';
        //  . $e->getMessage();
    }
}