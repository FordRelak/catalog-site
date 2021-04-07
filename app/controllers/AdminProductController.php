<?php


namespace app\controllers;


use app\core\Controller;

class AdminProductController extends Controller
{
	private $productId;

	public function __construct($route)
	{
		parent::__construct($route);
		$this->view->layout = 'admin';
		if (isset($route[0]['productId'])) {
			$this->productId = $route[0]['productId'];
		}
	}

	public function indexAction()
	{
		$this->loadModel('Product');
		$this->loadModel('Category');

		if (!empty($_POST)) {
			$this->updateAction();
		}

		$result['Product'] = $this->model['Product']->getProductById($this->productId)[0];
		$result['Categories'] = $this->model['Category']->getAllCategories();
		$result['ProductCategory'] = $this->model['Product']->getCategoriesProductById($this->productId);

		foreach ($result['ProductCategory'] as $item) {
			$productCategories[$item['categoryName']] = $item;
		}
		if (isset($productCategories)) {
			$result['ProductCategory'] = $productCategories;
		}

		$this->view->render($result['Product']['productName'], 'admin/product/', [], $result);
	}

	private function updateAction()
	{
		$id = isset($_POST['productId']) ? $_POST['productId'] : "";
		$name = $_POST['productName'];
		$sh = $_POST['descSh'];
		$fl = $_POST['descFull'];
		if (isset($_POST['isStock'])) {
			$iS = $_POST['isStock']=='Yes'? 1 : 0;
		}
		$categories = $_POST['categories'];

		if (empty($id)) {
			$this->addAction($name, $sh, $fl, $categories);
		} else {
			$this->model['Product']->update($id, $name, $sh, $fl, $iS, $categories);
		}

		$this->view->redirect('/admin/product/page/0');

	}

	private function addAction($name, $sh, $fl, $categories)
	{
		$this->model['Product']->add($name, $sh, $fl, $categories);
	}

}