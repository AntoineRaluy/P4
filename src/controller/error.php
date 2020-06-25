<?php

namespace App\src\controller;
use Exception;

class ErrorController
{
    public function errorNotFound()
    {
        throw new Exception('Page inconnue.');
    }

    public function errorEmpty()
    {
        throw new Exception('Tous les champs ne sont pas remplis !');
    }

    public function errorServer()
    {
        echo 'Erreur : ' . $e->getMessage();
    }
}