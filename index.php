<?php

require 'app\lib\dev.php';

use app\config\Database;
use app\core\Registry;
use app\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require $path;
    }
});

//session_start();

Registry::set('db', new Database());

$router = new Router();
$router->run();