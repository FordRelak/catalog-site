<?php


namespace app\core;


abstract class Controller
{
	public $route;
	public $view;
	public $model;

	public function __construct($route)
	{
		$this->route = $route;
		$this->view = new View($this->route);
	}

	public function loadModel($name)
	{
		$path = 'app\models\\' . ucfirst($name);
		if (class_exists($path)) {
			$this->model[$name] = new $path;
			return $this->model;
		}
	}
}