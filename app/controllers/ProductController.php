<?php


namespace app\controllers;


use app\core\Controller;

class ProductController extends Controller
{

	private $productId;
	/*private $categories = [];*/

	public function __construct($route)
	{
		parent::__construct($route);
		if (isset($route)) {
			$this->productId = $route[0]['productId'];
		}

	}

	public function indexAction()
	{

		$model = $this->loadModel('Product');
		$result['Product'] = $model['Product']->getProductById($this->productId)[0];
		$result['Categories'] = $model['Product']->getCategoriesProductById($this->productId);

		$this->view->render($result['Product']['productName'], 'product/', [], $result);
	}


}