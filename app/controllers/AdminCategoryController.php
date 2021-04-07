<?php


namespace app\controllers;


use app\core\Controller;
use app\models\Category;

class AdminCategoryController extends Controller
{
	private $categoryId;

	public function __construct($route)
	{
		parent::__construct($route);
		$this->view->layout = 'admin';
		if (isset($route[0]['categoryId'])) {
			$this->categoryId = $route[0]['categoryId'];
		}

	}

	public function indexAction()
	{
		$this->loadModel('Category');
		if (!empty($_POST)) {
			$this->updateAction();
		}
		$result['Category'] = $this->model['Category']->getCategoryById($this->categoryId);

		$this->view->render($result['Category']['categoryName'], 'admin/category/', [], $result);
	}

	private function updateAction()
	{
		$id = isset($_POST['categoryId']) ? $_POST['categoryId'] : "";

		$name = $_POST['categoryName'];
		$sh = $_POST['descSh'];
		$fl = $_POST['descFull'];

		if (empty($id)) {
			$this->addAction($name, $sh, $fl);
		} else {
			$this->model['Category']->update($id, $name, $sh, $fl);
		}

		$this->view->redirect('/admin/category/page/0');
	}

	private function addAction($name, $sh, $fl)
	{
		$this->model['Category']->add($name, $sh, $fl);
	}


}