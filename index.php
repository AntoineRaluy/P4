<?php

require_once 'src/controller/frontend.php';
require_once 'src/controller/backend.php';
require_once 'src/controller/error.php';
require_once 'vendor/autoload.php';
require_once 'config/config.php';

$router = new \App\config\Router();
$router->run();