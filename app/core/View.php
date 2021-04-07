<?php


namespace app\core;


class View
{
	public $path;
	public $route;
	public $paginationUrl = "";
	public $activeProductPage = 0;
	public $activeCategoryPage = 0;
	public $layout = 'default';

	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $this->route['controller'] . '/' . $this->route['action'];


		if (strpos($_SERVER['REQUEST_URI'], 'category')){
			$length = strpos($_SERVER['REQUEST_URI'], '/goods', 1);
			$substr = substr($_SERVER['REQUEST_URI'], 0, $length);
			$this->paginationUrl.=$substr;
		}


		/*$strWithoutPage = strrpos($_SERVER['REQUEST_URI'], '/page');

		if ($strWithoutPage > 0 && $strWithoutPage) {
			$this->paginationUrl = substr($_SERVER['REQUEST_URI'], 0, $strWithoutPage);
		} else if ($strWithoutPage === 0) {
			$this->paginationUrl ='';
		} else {
			$this->paginationUrl = $_SERVER['REQUEST_URI'];
		}*/

		if (!empty($this->paginationUrl)) {
			if ($this->paginationUrl[strlen($this->paginationUrl) - 1] == '/') {
				$this->paginationUrl = substr($this->paginationUrl, 0, -1);
			}
		}

		if (isset($this->route[0]['productPage'])) {
			$this->activeProductPage = $this->route[0]['productPage'];
		}
		if (isset($this->route[0]['categoryPage'])) {
			$this->activeCategoryPage = $this->route[0]['categoryPage'];
		}

	}

	public function render($title, $pathDirectory, $views = [], $vars = [])
	{
		extract($vars);

		if (file_exists('app/views/' . strtolower($pathDirectory))) {

			foreach ($views as $viewName) {
				if (file_exists('app/views/' . strtolower($pathDirectory) . strtolower($viewName) . '.php')) {
					ob_start();
					require 'app/views/' . strtolower($pathDirectory) . strtolower($viewName) . '.php';
					$content[strtolower($viewName)] = ob_get_clean();
				}
			}

			ob_start();
			require 'app/views/' . strtolower($pathDirectory) . 'index.php';
			$content['index'] = ob_get_clean();
		}
		require 'app/views/layouts/' . $this->layout . '.php';


	}

	public static function errorCode($code)
	{
		http_response_code($code);
		require 'app/views/errors/' . $code . '.php';
		exit();
	}

	public function redirect($url)
	{
		header('Location: http://'.$_SERVER['HTTP_HOST']. $url);
		exit();
	}
}