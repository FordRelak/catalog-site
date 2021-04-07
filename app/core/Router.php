<?php


namespace app\core;


class Router
{

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'app\config\routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }


    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $path = $url['path'];
        if (strlen($path) > 2) {
            $path = trim($url['path'], '/');
        } else $path = '';
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $path, $matches)) {
                $this->params = $params;
                array_push($this->params, $matches);
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    //Ошибка: не найден метод контроллера
                    View::errorCode(404);
                }
            } else {
                //Ошибка: не найден контроллер
                View::errorCode(404);
            }
        } else {
            //Ошибка 404... Либо редирект
            View::errorCode(404);
        }
    }
}