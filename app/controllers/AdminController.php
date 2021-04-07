<?php


namespace app\controllers;


use app\core\Controller;

class AdminController extends Controller
{
	private $page = 0;
	private const RECORD_PER_PAGE = 100;

	public function __construct($route)
	{
		parent::__construct($route);
		$this->view->layout = 'admin';
		if (isset($this->route[0]['page'])) {
			$this->page = $this->route[0]['page'];
		}

	}

	function indexAction()
	{
		$this->view->render('Admin', 'admin/');
	}

	public function getCategoriesAction(){

		$this->loadModel('Category');

		$startCategory = $this->page * self::RECORD_PER_PAGE;

		$result['Categories']['Page'] = ceil($this->model['Category']->countRecordInDatabase('categories') / self::RECORD_PER_PAGE);
		$result['Categories']['Data'] = $this->model['Category']->getCategories($startCategory, self::RECORD_PER_PAGE);


		$this->view->render('AdminCategories', 'admin/categories/', [], $result);
	}

	public function getProductsAction(){
		$this->loadModel('Product');
		$this->loadModel('Category');

		$startProduct = $this->page * self::RECORD_PER_PAGE;

		$result['Products']['Page'] = ceil($this->model['Product']->countRecordInDatabase('goods') / self::RECORD_PER_PAGE);
		$result['Products']['Data'] = $this->model['Product']->getProducts($startProduct, self::RECORD_PER_PAGE);

		$result['Categories'] = $this->model['Category']->getAllCategories();

		$this->view->render('AdminProducts', 'admin/products/', [], $result);
	}

	public function deleteCategoryAction(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$this->loadModel('Category');
			$this->model['Category']->deleteCategoryById($_POST['id']);
		}
		$this->view->redirect('/admin/category/page/0');
	}

	public function offCategoryAction(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$this->loadModel('Category');
			$this->model['Category']->offCategoryById($_POST['id']);
		}
		$this->view->redirect('/admin/category/page/0');
	}

	public function onCategoryAction(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$this->loadModel('Category');
			$this->model['Category']->onCategoryById($_POST['id']);
		}
		$this->view->redirect('/admin/category/page/0');
	}

	public function deleteProductAction(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$this->loadModel('Product');
			$this->model['Product']->deleteProductById($id);
		}
		$this->view->redirect('/admin/product/page/0');
	}
}