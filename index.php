<?php

require __DIR__.'./config/config.php';
require __DIR__.'./vendor/autoload.php';

// require_once 'src/controller/Controller.php';
// require_once 'src/controller/frontend.php';
// require_once 'src/controller/backend.php';
// require_once 'src/controller/error.php';



session_start();

$router = new \App\config\Router();
$router->run();